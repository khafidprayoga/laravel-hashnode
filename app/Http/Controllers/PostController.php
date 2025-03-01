<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function Pest\Laravel\post;

class PostController extends Controller
{
    public function index()
    {
        $data = Http::post('https://gql.hashnode.com', [
            'query' => '
            query Publication {
                    publication(host: "khafidprayoga.my.id") {
                        id
                        isTeam
                        title
                        posts(first: 10) {
                            edges {
                                node {
                                    id
                                    title
                                    brief
                                    url
                                }
                            }
                        }
                    }
                }
            '
        ]);

        return $data->json();
    }

    public function show()
    {
        $data = Http::post("https://gql.hashnode.com", [
            'query' => '
            query Publication {
          publication(host: "khafidprayoga.my.id") {
            post(slug: "belajar-membuat-service-grpc") {
              title
              slug
              content {
                html,
                markdown
              }
              readTimeInMinutes
              publishedAt
              url
              coverImage {
                url
              }
              tags {
                name
                slug
              }
              author {
                name
                username
                profilePicture
              }
            }
          }
        }'
        ]);
        $post = $data->json()['data']['publication']['post'];

        return view('pages.about', [
            'title'=> $post['title'],
            'content' => $post['content']['html'],
        ]);
    }
}
