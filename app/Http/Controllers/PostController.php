<?php

namespace App\Http\Controllers;

use Barryvdh\Debugbar\Facades\Debugbar;
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

    public function show(Debugbar $debugger)
    {
        $data = Http::post("https://gql.hashnode.com", [
            'query' => '
            query Publication {
          publication(host: "khafidprayoga.my.id") {
            post(slug: "load-testing-with-grafana-k6-and-influxdb") {
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


        $debugger::debug($post);
        return view('pages.about', [
            'title' => $post['title'],
            'content' => $post['content']['html'],
        ]);
    }
}
