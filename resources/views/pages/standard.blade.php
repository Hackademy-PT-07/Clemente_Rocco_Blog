<x-main>

    <x-slot:title>{{ $title }}</x-slot>

        <div class="container justify-content-center">
            <div class="row">
                <div class="col">
                    <h1 class="text-center text-warning py-3">{{ $title }}</h1>

                    <p class="text-center text-light mw-5">{{ $text ?? '' }}</p>
                </div>
            </div>
        </div>

</x-main>