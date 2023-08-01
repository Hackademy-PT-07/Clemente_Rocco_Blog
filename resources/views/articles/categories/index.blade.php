<x-main>

    <div class="container my-5">
        <div class="row">
            <div class="col">

                <div class="row mb-4">
                    <div class="col-6">
                        <h1 class="text-warning">Categorie</h1>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('categories.create') }}">
                            <button class="btn btn-warning">Aggiungi</button>
                        </a>
                    </div>
                </div>

                <x-alert-msg />

                <table class="table shadow">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Articoli</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>
                                Numero di articoli: {{ $category->articles->count() }}<br>
                                <ul>
                                    @foreach($category->articles as $article)
                                        <li><a href="{{ route('article', $article) }}">{{ $article->title }}</a></li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="text-end">
                                <a class="btn btn-sm btn-primary" href="{{ route('categories.edit', $category->id) }}">
                                    Modifica
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline ms-2" onsubmit="return confirm('Stai per eliminare la categoria! Sei sicuro?')">
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