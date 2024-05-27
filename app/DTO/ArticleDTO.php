<?php

namespace App\DTO;

readonly class ArticleDTO
{

    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $title,
        public string $subtitle,
        public string $img,
        public string $text,
    )
    {}
}
