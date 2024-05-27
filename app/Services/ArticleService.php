<?php

namespace App\Services;

use App\DTO\ArticleDTO;
use App\Models\Article;

class ArticleService 
{
    public function createArticle(ArticleDTO $articleDTO) :Article
    {
        return Article::create([
            'title' => $articleDTO->title, 
            'subtitle' => $articleDTO->subtitle, 
            'img' => $articleDTO->img,
            'text' => $articleDTO->text, 
        ]);
    }

    public function indexArticle(){
        return Article::all();
    }
}