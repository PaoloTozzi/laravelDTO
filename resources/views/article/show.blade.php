<x-layout>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img class="img-fluid" src="{{ Storage::url($article->img) }}" alt="{{ $article->title }}">
                <h1>{{ $article->title }}</h1>
                <p>{{ $article->text }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <a href="{{ route('article.index') }}" class="btn btn-primary">Torna alla lista</a>
            </div>

            <div class="col-4">
                <form action="{{ route('article.destroy', ['article' => $article->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina</button>
                </form>
            </div>

            <div class="col-4">
                <a href="{{ route('article.edit', compact('article')) }}" class="btn btn-primary">Modifica articolo</a>
            </div>
        </div>
    </div>

</x-layout>
