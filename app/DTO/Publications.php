<?php

namespace App\DTO;

class Publications
{
    public array $posts;
    public array $pagination;

    /**
     * Create a new class instance.
     */
    public function __construct(array $publications)
    {
        $this->posts = $publications['posts'];
        $this->pagination = $publications['pageInfo'];
    }
}
