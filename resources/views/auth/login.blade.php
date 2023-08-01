<x-main>

    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">

                <form class="mt-5 bg-white border border-warning rounded shadow p-3" action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <h1 class="text-warning">Accedi</h1>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    @error('email') <span class="small text-danger">{{ $message }}</span> @enderror
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    @error('password') <span class="small text-danger">{{ $message }}</span> @enderror
                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-warning">Login</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-main>