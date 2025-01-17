<?php

namespace App\Livewire\Dashboard;

use App\Models\LogLogin;
use App\Models\Position;
use App\Models\Unit;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class DashboardPage extends Component
{
    #[Computed()]
    public function totalEmployee() 
    {
        return User::count();
    }

    #[Computed()]
    public function totalLogin() 
    {
        return LogLogin::count();
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
        return User::withCount('logLogins')
            ->having('log_logins_count', '>', 25)
            ->orderBy('log_logins_count', 'desc') 
            ->take(10)
            ->get();;
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard-page')
            ->layoutData([
                'title' => 'Dashboard',
            ]);
    }
}
