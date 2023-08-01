<x-main>

    <x-slot:title>{{ $title }}</x-slot>

        <div class="container mt-5">
            <div class="mt-4">
                <div class="row">
                    <div class="col-lg-6 mx-auto">

                        <x-alert-msg />

                        <form action="{{ route('contacts.save') }}" method="POST" class="mt-4 bg-white border border-warning rounded shadow p-3">
                            @csrf
                            <h1 class="text-warning">{{ $title }}</h1>
                            <div class="mt-3">
                                <p class="lead">{{ $text ?? '' }}</p>
                            </div>
                            <div class="row g-3 mt-3">
                                <div class="col-12">
                                    <label for="name">Nome</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label for="message">Messaggio</label>
                                    <textarea id="message" name="message" class="form-control" rows="6"></textarea>
                                </div>
                                @if(! session()->has('success'))
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-warning">Invia</button>
                                </div>
                                @endif
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>

</x-main>