<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-lg rounded-xl">
        <h2 class="text-2xl font-bold text-gray-700">Masuk ke Akun Anda</h2>
        <form class="space-y-4" wire:submit.prevent="login">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Username</span>
                </div>
                <input wire:model="form.username" type="text" placeholder="Input Username anda" class="input input-bordered w-full" />
                @error('form.username')
                    <div class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Password</span>
                </div>
                <input wire:model="form.password" type="password" placeholder="Input Password anda" class="input input-bordered w-full" />
                @error('form.password')
                    <div class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <button type="submit" wire:loading.attr="disabled"
                class="w-full btn btn-primary">
                <span wire:loading.remove>Masuk</span>
                <span wire:loading>Memuat...</span>
            </button>
        </form>
    </div>
</div>
