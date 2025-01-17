<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-lg rounded-xl">
        <h2 class="text-2xl font-bold text-gray-700">Masuk ke Akun Anda</h2>
        @if ($isInvalid)
            <div role="alert" class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Username atau Password salah</span>
            </div>
        @endif
        <form class="space-y-4" wire:submit.prevent="login">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Username</span>
                </div>
                <input wire:model="form.username" type="text" placeholder="Input Username anda"
                    class="input input-bordered w-full" />
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
                <input wire:model="form.password" type="password" placeholder="Input Password anda"
                    class="input input-bordered w-full" />
                @error('form.password')
                    <div class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <button type="submit" wire:loading.attr="disabled" class="w-full btn btn-primary">
                <span wire:loading.remove>Masuk</span>
                <span wire:loading>Memuat...</span>
            </button>
        </form>
    </div>
</div>
