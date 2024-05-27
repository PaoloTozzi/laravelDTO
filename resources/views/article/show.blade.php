<x-layout>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="{{ Storage::url($article->img) }}" alt="{{ $article->title }}">
                <h1>{{ $article->title }}</h1>
                <p>{{ $article->body }}</p>
            </div>
            <div class="col-md-12">
                <a href="{{ route('article.index') }}" class="btn btn-primary">Torna alla lista</a>
            </div>

            <div>
                <form action="{{ route('article.destroy', ['article' => $article->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina</button>
                </form>
            </div>
        </div>

</x-layout>
