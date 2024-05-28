<?php

namespace App\Http\Controllers;

use App\DTO\ArticleDTO;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Services\ArticleService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;

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
    public function store(ArticleStoreRequest $request) :RedirectResponse
    {
        $articleDTO = new ArticleDTO(
            $request->title,
            $request->subtitle,
            $request->file('img')->store('public/images'),
            $request->text,
        );

        $this->articleService->createArticle($articleDTO);

        return to_route('home')->with('message', 'Articolo inserito con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article) :View
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article) :View
    {
        return view('article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleUpdateRequest $request, Article $article) :RedirectResponse
    {
        $articleDTO = new ArticleDTO(
            $request->title,
            $request->subtitle,
            $request->file('img') ? $request->file('img')->store('public/images') : $article->img,
            $request->text
        );

        $this->articleService->updateArticle($articleDTO, $article);

        return to_route('home')->with('message', 'Articolo aggiornato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article) :RedirectResponse
    {
        $this->articleService->deleteArticle($article);

        return to_route('home')->with('message', 'Articolo eliminato con successo');
    }
}
