<?php

namespace App\Livewire\Employee;

use App\Livewire\Forms\Employee\EmployeeForm;
use App\Models\Unit;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeList extends Component
{
    use WithPagination;

    public EmployeeForm $form;
    public $isUpdate = false;
    
    #[Computed()]
    public function users() {
        return User::with(['unit'])->paginate(10);
    }

    #[Computed()]
    public function units() {
        return Unit::get();
    }

    public function render()
    {
        return view('livewire.employee.employee-list')
            ->layoutData([
                'title' => 'Karyawan',
            ]);
    }

    public function save() {
        if ($this->isUpdate) {
            $this->form->update();
            $this->isUpdate = false;
        } else {
            $this->form->store();
        }
        $this->dispatch('close-modal');
    }

    public function edit($id) {
        $this->isUpdate = true;
        $unit = User::find($id);
        $this->form->setUnit($unit);
    }

    public function delete($id) {
        User::destroy($id);
    }
}
