<div>

    <x-alert-msg />
    
    <form wire:submit.prevent="store" class="bg-white p-3">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" wire:model="user.name">
            @error('user.name') <span class="small text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" wire:model.lazy="user.email">
            @error('user.email') <span class="small text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" wire:model="password">
            @error('password') <span class="small text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Aggiungi</button>
    </form>

</div>