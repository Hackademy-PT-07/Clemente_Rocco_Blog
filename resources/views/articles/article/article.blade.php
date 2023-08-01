<x-main>

    <x-slot:title>{{ $article['title'] }}</x-slot>

        <div class="container my-4">
            <div class="row">
                <div class="col-6">
                    <div>
                        <a href="{{ route('articles') }}"><i class="bi bi-arrow-left-square fs-1"></i> </a>
                    </div>

                    <h1 class="mt-4 text-warning">{{ $article['title'] }}</h1>
                    <p>Scritto da: {{ $article->user->name }} (<a href="mailto:{{ $article->user->email }}">{{ $article->user->email }}</a>)</p>

                    @if($article->image)
                    <img src="{{ Storage::url($article['image']) }}" class="img-fluid" alt="{{ $article->title }}">
                    @endif

                    <h4>
                        @foreach($article->categories as $category)
                        {{ $category->name }}
                        @endforeach
                    </h4>

                    <p class="mt-4">{{ $article['description'] }}</p>
                </div>
            </div>
        </div>

</x-main>