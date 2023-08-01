<!DOCTYPE html>

<x-main>

<x-slot:title>{{ $title }}</x-slot>

    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-between">
                <h1 class="mt-4 text-warning">{{ $title }}</h1>
            </div>
        </div>
    </div>


    <div class="container my-5">

        <div class="row d-flex flex-row gap-3">
            @if (!$articles)
            <h3>Nessun articolo disponibile</h3>
            @else
            @foreach ($articles as $article)
            <x-card 
                :title="$article->title" 
                :categories="$article->categories" 
                :article-id="$article->id" 
            />
            @endforeach
            @endif
        </div>
    </div>

</x-main>