<x-main>

    <div class="container my-5">
        <div class="row">
            <div class="col">

                <div class="row mb-4">
                    <div class="col-6">
                        <h1 class="text-warning">Articoli</h1>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('createArticle') }}">
                            <button class="btn btn-warning">Aggiungi</button>
                        </a>
                    </div>
                </div>

                <x-alert-msg />

                <table class="table shadow">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Categoria</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <th scope="row">{{ $article->id }}</th>
                            <td>{{ $article->title }}</td>
                            <td>
                                @foreach($article->categories as $category)
                                {{ $category->name }}
                                @endforeach
                            </td>
                            <td class="text-end">
                                <a class="btn btn-sm btn-primary" href="{{ route('editArticle', $article) }}">
                                    Modifica
                                </a>
                                <form action="{{ route('destroyArticle', $article) }}" method="POST" class="d-inline ms-2" onsubmit="return confirm('Stai per eliminare la categoria! Sei sicuro?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Elimina</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-main>