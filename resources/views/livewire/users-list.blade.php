<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="text-end">
                    <button class="btn btn-sm btn-primary" wire:click="editUser({{ $user->id }})">Modifica</button>
                    <button class="btn btn-sm btn-danger" wire:click="deleteUser({{ $user->id }})">Cancella</button>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>