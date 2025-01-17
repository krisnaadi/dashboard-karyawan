<div class="p-4 lg:p-10 space-y-4" x-data="{ modalOpen: false }">
    <div class="text-right">
        <button class="btn btn-primary" @click="modalOpen=true"><x-heroicon-o-plus class="w-5 h-5" /> Tambah </button>
    </div>
    <div class="card bg-base-100 w-full shadow-xl">
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th></th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->units as $unit)
                        <tr class="hover">
                            <th>
                                {{ $loop->iteration + ($this->units->currentPage() - 1) * $this->units->perPage() }}
                            </th>
                            <td>{{ $unit->name }}</td>
                            <td width="200px">
                                <div class="flex gap-2">
                                    <button class="btn btn-square btn-ghost btn-sm" wire:click="edit({{ $unit->id }}); modalOpen=true">
                                        <x-heroicon-o-pencil class="w-5 h-5" />
                                    </button>
                                    <button class="btn btn-square btn-ghost btn-sm" wire:click="delete({{ $unit->id }})"
                                        wire:confirm="yakin ingin menghapus data ini?">
                                        <x-heroicon-o-trash class="w-5 h-5" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{ $this->units->links() }}

    <template x-teleport="body">
        <div x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak
            @close-modal.window="modalOpen=false">
            <div x-show="modalOpen"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="modalOpen=false" class="absolute inset-0 w-full h-full bg-white backdrop-blur-sm bg-opacity-70"></div>
            <div x-show="modalOpen"
                x-trap.inert.noscroll="modalOpen"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-y-2 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 -translate-y-2 sm:scale-95"
                class="relative w-full py-6 bg-white border shadow-lg px-7 border-neutral-200 sm:max-w-lg sm:rounded-lg">
                <div class="flex items-center justify-between pb-3">
                    <h3 class="text-lg font-semibold">Unit</h3>
                    <button @click="modalOpen=false" class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>  
                    </button>
                </div>
                <form wire:submit.prevent="save">
                    <div class="relative w-auto pb-8">
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Nama</span>
                            </div>
                            <input wire:model="form.name" type="text" placeholder="Input nama unit" class="input input-bordered w-full" />
                            @error('form.name')
                                <div class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror
                        </label>
                    </div>
                    <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
                        <button type="submit" wire:loading.attr="disabled" class="inline-flex btn btn-primary">
                            <span wire:loading.remove>Simpan</span>
                            <span wire:loading>Menyimpan...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </template>
</div>
