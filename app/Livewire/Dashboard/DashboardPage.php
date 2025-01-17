<?php

namespace App\Livewire\Dashboard;

use App\Models\LogLogin;
use App\Models\Position;
use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DashboardPage extends Component
{
    #[Validate('required|date|before_or_equal:endDate')]
    public $startDate;
    #[Validate('required|date|after_or_equal:startDate')]
    public $endDate;

    public function mount()
    {
        $this->startDate = now()->format('Y-m-d');
        $this->endDate = now()->format('Y-m-d');
    }

    #[Computed()]
    public function totalEmployee() 
    {
        $user = User::query();
        if ($this->startDate && $this->endDate) {
            $user->whereBetween('join_date', [$this->startDate, $this->endDate]);
        }
        return $user->count();
    }

    #[Computed()]
    public function totalLogin() 
    {
        $logLogin = LogLogin::query();
        if ($this->startDate && $this->endDate) {
            $logLogin->whereBetween(DB::raw('DATE(created_at)'), [$this->startDate, $this->endDate]);
        }
        return $logLogin->count();
    }

    #[Computed()]
    public function totalUnit() 
    {
        return Unit::count();
    }

    #[Computed()]
    public function totalPosition() 
    {
        return Position::count();
    }

    #[Computed()]
    public function topEmployee() 
    {
        $user = User::withCount('logLogins')
            ->having('log_logins_count', '>', 25)
            ->orderBy('log_logins_count', 'desc') 
            ->take(10);

        if ($this->startDate && $this->endDate) {
            $user->whereHas('logLogins', function ($query) {
                $query->whereBetween(DB::raw('DATE(created_at)'), [$this->startDate, $this->endDate]);
            });
        }

        return $user->get();
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard-page')
            ->layoutData([
                'title' => 'Dashboard',
            ]);
    }
}
