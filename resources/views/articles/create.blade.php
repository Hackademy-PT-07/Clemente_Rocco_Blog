<x-main>

    <x-slot:title>{{ $title }}</x-slot>

        <div class="container">

            <div class="row">
                <div class="col mt-3">

                    <form class="my-4 bg-white border border-warning rounded shadow p-3" action="{{ route('storeArticle') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-between">                        
                        <h1 class="text-warning mb-4">Crea Articolo</h1>
                            <a href="{{ route('articlesList') }}">
                                <button type="button" class="btn btn-secondary">Indietro</button> 
                            </a>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Titolo</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
                            @error('title') <span class="small text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Categorie</label>
                            @foreach($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $category->name }}
                                </label>
                            </div>
                            @endforeach
                            @error('category_id') <span class="small text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descrizione</label>
                            <input type="text" name="description" class="form-control" id="description" value="{{ old('description') }}">
                            @error('description') <span class="small text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Immagine</label>
                            <input class="form-control" type="file" name="image" id="image">
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Corpo</label>
                            <textarea name="body" class="form-control" id="body" rows="10" value="{{ old('body') }}"></textarea>
                            @error('body') <span class="small text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-warning my-3">Crea articolo</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

</x-main>