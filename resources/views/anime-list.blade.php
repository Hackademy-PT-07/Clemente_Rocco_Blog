<x-main>

<x-slot:title>{{ $title }}</x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <ul class="list-group shadow">

                    @foreach ($genres as $genre)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('animeByGenre', $genre['mal_id']) }}" >{{ $genre['name'] }}</a>
                        <span class="badge bg-primary rounded-pill">{{ $genre['count'] }}</span>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>

</x-main>