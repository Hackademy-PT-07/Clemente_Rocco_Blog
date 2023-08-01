<x-main>

    <x-slot:title>{{ $title }}</x-slot>

        <div class="container mt-5">
            <div class="mb-3">
                <a href="{{ route('anime-list') }}">
                    <button class="btn btn-warning" type="button">Indietro</button>
                </a>
            </div>
            <div class="row">

                @foreach($animeByGenre as $anime)
                <div class="col-12 col-md-4 col-lg-3 mb-3">
                    <div class="card mb-3 h-100 shadow">
                        <img src="{{ $anime['images']['jpg']['large_image_url'] }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $anime['title'] }}</h5>
                            <p class="card-text"><small class="text-body-secondary">{{ $anime['episodes'] }} ep</small></p>
                            <p class="card-text">{{ $anime['synopsis'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

</x-main>