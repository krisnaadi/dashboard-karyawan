<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-lg rounded-xl">
        <h2 class="text-2xl font-bold text-gray-700">Masuk ke Akun Anda</h2>
        <form class="space-y-4" wire:submit.prevent="login">
            <input type="text" placeholder="Input Username anda" class="input input-bordered w-full max-w-xs" />

            <input type="password" placeholder="Input Password anda" class="input input-bordered w-full max-w-xs" />

            <button type="submit" wire:loading.attr="disabled"
                class="w-full btn btn-primary">
                <span wire:loading.remove>Masuk</span>
                <span wire:loading>Memuat...</span>
            </button>
        </form>
    </div>
</div>
