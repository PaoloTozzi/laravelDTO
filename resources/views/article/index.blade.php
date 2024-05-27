<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Ciao
                </h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-12 col-md-4">
                    <x-card
                        title="{{$article->title}}"
                        subtitle="{{$article->subtitle}}"
                        img="{{Storage::url($article->img)}}"
                        text="{{$article->text}}"
                        url="{{route('article.show', ['article' => $article->id])}}"
                    />
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
