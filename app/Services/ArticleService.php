<?php

namespace App\Services;

use App\DTO\ArticleDTO;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

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
        return Article::orderBy('created_at','desc')->get();
    }

    public function showArticle(Article $article){
        return $article;
    }

    public function deleteArticle(Article $article){

        if($article->img){
            Storage::delete($article->img);
        }

        return $article->delete();
    }
}
