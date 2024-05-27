<?php

namespace App\Http\Controllers;

use App\DTO\ArticleDTO;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Services\ArticleService;
use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{

    private ArticleService $articleService;

    public function __construct(ArticleService $articleService) {
        $this->articleService = $articleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {
        return view('article.index', ['articles' => $this->articleService->indexArticle()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $articleDTO = new ArticleDTO(
            $request->title,
            $request->subtitle,
            $request->file('img')->store('public/image'),
            $request->text,
        );

        $article = $this->articleService->createArticle($articleDTO);

        return to_route('home')->with('message', 'Articolo inserito con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
