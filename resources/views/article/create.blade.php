<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Inserisci il tuo articolo</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{route('article.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="inputTitle" class="form-label">Titolo</label>
                        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="inputTitle">
                        @error('title')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="inputSubtitle" class="form-label">Sottotitolo</label>
                        <input name="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror" id="inputSubtitle">
                        @error('subtitle')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="inputImg" class="form-label">Inserisci un'immagine</label>
                        <input name="img" type="file" class="form-control @error('img') is-invalid @enderror" id="inputImg">
                        @error('img')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="inputText" class="form-label">Corpo dell'articolo</label>
                        <textarea name="text" class="form-control @error('text') is-invalid @enderror" id="inputText" cols="30" rows="10"></textarea>
                        @error('text')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
