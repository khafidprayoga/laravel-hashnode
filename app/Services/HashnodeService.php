<?php

namespace App\Services;

use App\Exceptions\GraphQLRequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class HashnodeService
{
    /*
     *  @var string publicationId for khafidprayoga.my.id
     *
     */
    private const publicationId = '67c1cafc6e6d991710059a07';

    /*
     * @var string authorIdMaster for primarily written blog article
     */
    private const authorIdMaster = '67c1cae9589c6b67f5556384';

    /*
     * @var string authorIdOpinion for opinion for books or current issue
     */
    private const authorIdOpinion = '67c5cd1d71fb56b1557fcfe5';

    /*
     * @var string host for my headless blog hostname domain
     */
    protected string $host;

    /*
     * @var string url for hashnode graphql server endpoint
     */
    protected string $url;

    private const paginationPageSize = 10;

    public function __construct()
    {
        $this->host = config('services.hashnode.host');
        $this->url = config('services.hashnode.url');
    }

    private function searhPostOfPublication(
        ?string $search,
        ?string $nextCursor,
        ?array $tagsId,
        array $authorIds,
    ): array {
        $query = '
       query Posts($tagsId: [ID!], $search: String, $publicationId: ObjectId!, $pageSize: Int!, $nextCursor: String, $authorIds: [ID!]!) {
          publication: searchPostsOfPublication(
            first: $pageSize
            after: $nextCursor
            sortBy: DATE_PUBLISHED_DESC
            filter: {tagIds: $tagsId, query: $search, publicationId: $publicationId, authorIds: $authorIds}
          ) {
            posts: edges {
              node {
                slug
                id
                title
                publishedAt
                brief
                readTimeInMinutes
                coverImage {
                  url
                }
                tags {
                  id
                  name
                  slug
                }
              }
            }
            pageInfo {
              hasNextPage
              endCursor
            }
          }
        }
';

        $vars = [
            'publicationId' => self::publicationId,
            'pageSize' => self::paginationPageSize,
            'authorIds' => $authorIds,

            // optionals argument params
            'nextCursor' => $nextCursor,
            'search' => $search,
            'tagsId' => $tagsId,
        ];

        $response = Http::post($this->url, [
            'query' => $query,
            'variables' => $vars,
        ]);

        $data = $response->json();

        $this->errCheck($query, $vars, $data);

        return $data['data'];
    }

    public function getPosts(
        ?string $search = null,
        ?string $nextCursor = null,
        ?array $tags = null,
    ): array {
        $publication = $this->searhPostOfPublication(
            search: $search,
            nextCursor: $nextCursor,
            tagsId: $tags,
            authorIds: [self::authorIdMaster]
        );

        return $publication['publication']['posts'];
    }

    public function getOpinions(
        ?string $search = null,
        ?string $nextCursor = null,
    ): array {
        $publication = $this->searhPostOfPublication(
            search: $search,
            nextCursor: $nextCursor,
            authorIds: [self::authorIdOpinion]
        );

        return $publication['publication']['posts'];
    }

    public function getPost(string $slug): ?array
    {
        $query = '
       query PostDetail($postId: ID!) {
          post(id: $postId) {
            coverImage{
             url
            }
            title
            publishedAt
            readTimeInMinutes
            author {
                profilePicture
                name
                tagline
                bio {
                    text
                }
            }
            content {
              html
              markdown
            }
            tags {
              id
              name
              slug
            }
          }
}
';

        $postId = Str::after($slug, '--');
        $response = Http::post($this->url, [
            'query' => $query,
            'variables' => [
                'postId' => $postId,
            ],
        ]);

        $data = $response->json();

        return $data['data']['post'];
    }

    public function getPage(string $slug): ?array
    {
        $query = '
      query GetStaticPage($host: String!, $pageSlug: String!) {
          publication(host: $host) {
            staticPage(slug: $pageSlug) {
              title
              ogMetaData {
                image
              }
              content {
                html
                markdown
              }
              seo {
                title
                description
              }
            }
          }
        }
        ';

        $vars = [
            'host' => $this->host,
            'pageSlug' => $slug,
        ];
        $response = Http::post($this->url, [
            'query' => $query,
            'variables' => $vars,
        ]);

        $data = $response->json();
        $this->errCheck($query, $vars, $data);

        return $data['data']['publication']['staticPage'];
    }

    private function errCheck(string $query, array $vars, array $data): void
    {
        Log::debug('graphql request', [
            'query' => $query,
            'vars' => $vars,
        ]);
        // contains query errors
        if (isset($data['errors'])) {
            Log::error($data['errors']);
            throw new GraphQLRequestException(json_encode($data['errors']), 400);
        }

    }
}
