<div class="p-4 lg:p-10 space-y-4" x-data="{ modalOpen: false }">
    <div class="text-right">
        <button class="btn btn-primary" wire:click="create"><x-heroicon-o-plus class="w-5 h-5" /> Tambah</button>
    </div>
    <div class="card bg-base-100 w-full shadow-xl">
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th></th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Unit</th>
                        <th>Jabatan</th>
                        <th>Tanggal Bergabung</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->users as $user)
                        <tr class="hover">
                            <th>
                                {{ $loop->iteration + ($this->users->currentPage() - 1) * $this->users->perPage() }}
                            </th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->unit->name }}</td>
                            <td>{{ $user->positions?->pluck('name')->implode(', ') }}</td>
                            <td>{{ $user->join_date->format('d-m-Y') }}</td>
                            <td width="200px">
                                <div class="flex gap-2">
                                    <button class="btn btn-square btn-ghost btn-sm"
                                        wire:click="edit({{ $user->id }}); modalOpen=true">
                                        <x-heroicon-o-pencil class="w-5 h-5" />
                                    </button>
                                    <button class="btn btn-square btn-ghost btn-sm"
                                        wire:click="delete({{ $user->id }})"
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

    {{ $this->users->links() }}

    @include('livewire.employee.partials.create-modal')
</div>
