<div class="p-4 lg:p-10 space-y-4">
    <div class="flex items-center">
        <input type="date" wire:model="startDate"
            class="input input-bordered w-full" />
        <span class="mx-2 text-lg">-</span>
        <input type="date" wire:model="endDate"
            class="input input-bordered w-full" />
    </div>
    <section class="stats stats-vertical col-span-12 w-full shadow-sm xl:stats-horizontal">
        <div class="stat">
            <div class="stat-title">Total Karyawan</div>
            <div class="stat-value">{{ $this->totalEmployee }}</div>
        </div>

        <div class="stat">
            <div class="stat-title">Total Login</div>
            <div class="stat-value">{{ $this->totalLogin }}</div>
        </div>

        <div class="stat">
            <div class="stat-title">Total Unit</div>
            <div class="stat-value">{{ $this->totalUnit }}</div>
        </div>

        <div class="stat">
            <div class="stat-title">Total Jabatan</div>
            <div class="stat-value">{{ $this->totalPosition }}</div>
        </div>
    </section>
    <section class="card col-span-12 overflow-hidden bg-base-100 shadow-sm">
        <div class="card-body grow-0">
            <h2 class="card-title">
                Top 10 Karyawan
            </h2>
        </div>
        <div class="overflow-x-auto">
            <table class="table text-lg table-zebra">
                <tbody>
                    @forelse ($this->topEmployee as $employee)
                        <tr>
                            <td>$loop->iteration</td>
                            <td width="70%">{{ $employee->name }}</td>
                            <td>
                                {{ $employee->log_logins_count }}
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
    </section>
    <!-- /card -->
</div>
