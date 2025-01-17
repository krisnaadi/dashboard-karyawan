<template x-teleport="body">
    <div x-show="modalEditOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen"
        x-cloak @close-modal.window="modalEditOpen=false"
        @open-edit-modal.window="modalEditOpen=true">
        <div x-show="modalEditOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="modalEditOpen=false"
            class="absolute inset-0 w-full h-full bg-white backdrop-blur-sm bg-opacity-70"></div>
        <div x-show="modalEditOpen" x-trap.inert.noscroll="modalEditOpen" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-2 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 -translate-y-2 sm:scale-95"
            class="relative w-full py-6 bg-white border shadow-lg px-7 border-neutral-200 sm:max-w-lg sm:rounded-lg">
            <div class="flex items-center justify-between pb-3">
                <h3 class="text-lg font-semibold">{{ $isUpdate ? 'Edit' : 'Tambah' }} Jabatan</h3>
                <button @click="modalEditOpen=false"
                    class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form wire:submit.prevent="save">
                <div class="relative w-auto pb-8">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Nama</span>
                        </div>
                        <input wire:model="editForm.name" type="text" placeholder="Input nama karyawan"
                            class="input input-bordered w-full" />
                        @error('editForm.name')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Username</span>
                        </div>
                        <input wire:model="editForm.username" type="text" placeholder="Input username karyawan"
                            class="input input-bordered w-full" />
                        @error('editForm.username')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Unit</span>
                        </div>
                        <x-mary-choices class="border-neutral-content" wire:model="editForm.unit_id"
                            :options="$this->units" placeholder="Search ..." single searchable search-function="searchUnit"
                            debounce="300ms" min-chars="2" >
                            <x-slot:append>
                                <x-mary-button label="Create" icon="o-plus" class="rounded-s-none btn-primary" wire:click="createUnit"/>
                            </x-slot:append>
                        </x-mary-choices-offline>
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Jabatan</span>
                        </div>
                        <x-mary-choices class="border-neutral-content" wire:model="editForm.position_ids"
                            :options="$this->positions" placeholder="Search ..." searchable search-function="searchPosition"
                            debounce="300ms" min-chars="2">
                            <x-slot:append>
                                <x-mary-button label="Create" icon="o-plus" class="rounded-s-none btn-primary" wire:click="createPosition"/>
                            </x-slot:append>
                        </x-mary-choices-offline>
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Tanggal Bergabung</span>
                        </div>
                        <input wire:model="editForm.join_date" type="date" placeholder="Input nama unit"
                            class="input input-bordered w-full" />
                        @error('editForm.join_date')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                </div>
                <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
                    <button type="submit" wire:loading.attr="disabled" class="inline-flex btn btn-primary">
                        <span wire:loading.remove>Simpan</span>
                        <span wire:loading>Loading...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>