<x-main>

    <x-slot:title>{{ config('app.name') }}</x-slot>

<!--     <div class="text-end">
        @if($auth)
        <span>{{ $auth['name'] }} - {{ $auth['email'] }}</span>
        @else
        <a href="/login">Accedi</a>
        @endif
    </div> -->

    <!-- <h1 class="text-center text-warning py-3">{{ env('APP_NAME')}}</h1> -->

    <h1 class="text-center text-warning py-3">{{ config('app.name') }}</h1>

    @auth
    <p class="text-center text-light">Ciao {{ auth()->user()->name }}</p>
    @endauth

</x-main>