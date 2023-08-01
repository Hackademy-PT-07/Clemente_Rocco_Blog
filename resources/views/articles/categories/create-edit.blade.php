<x-main>

    <div class="container my-5">
        <div class="row">
            <div class="col-8 mx-auto">



                <form action="{{ $route }}" method="POST" class="bg-white border border-warning rounded shadow p-3">
                    @csrf
                    @if($type === "edit")
                    @method('PUT')
                    @endif
                    <div class="d-flex justify-content-between">
                        <h2 class="mb-4 text-warning">{{ $title }}</h2>
                        <a href="{{ route('categories.index') }}">
                            <button type="button" class="btn btn-secondary">Indietro</button>
                        </a>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Categoria</label>
                        <input type="text" class="form-control" name="name" id="name" maxlength="50" value="{{ $value }}">
                        @error('name') <span class="text-danger small">{{ $message }}</span>@enderror
                    </div>
                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-warning">{{ $btnText }}</button>

                    </div>
                </form>

            </div>
        </div>
    </div>

</x-main>