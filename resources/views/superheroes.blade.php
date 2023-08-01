<x-main>

    <x-slot:title>{{ $title }}</x-slot>

    <div class="container mt-5">
        <h1 class="text-warning">Supereroi</h1>

        <div class="mt-5">
            <ul class="list-unstyled" id="superheroes"></ul>
        </div>
    </div>

    <script>
        const list = document.getElementById('superheroes');

        fetch('/api/superheroes')
            .then(response => response.json())
            .then(data => {

                console.log(data);

                for (let item of data) {

                    list.innerHTML += `<li>${item.name} ${item.age}</li>`;

                }
            })
            .catch(error => {});
    </script>

</x-main>