<div class="card shadow" style="width: 18rem;">
    <div class="card-body">
        <h3 class="card-title mb-4">{{ $title }} </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                @foreach($categories as $category)
                {{ $category->name }}
                @endforeach
            </h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="{{ route('article', $articleId) }}">
                <button type="button" class="btn btn-warning">
                    Leggi
                </button>
            </a>
    </div>
</div>