<?php

namespace App\Livewire\Employee;

use App\Livewire\Forms\Employee\CreateEmployeeForm;
use App\Livewire\Forms\Employee\EditEmployeeForm;
use App\Models\Position;
use App\Models\Unit;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeList extends Component
{
    use WithPagination;

    public CreateEmployeeForm $form;
    public EditEmployeeForm $editForm;
    public $isUpdate = false;
    
    #[Computed()]
    public function users() {
        return User::with(['unit', 'positions'])->paginate(10);
    }

    #[Computed()]
    public function units() {
        return Unit::get();
    }

    #[Computed()]
    public function positions() {
        return Position::get();
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
            $this->editForm->update();
            $this->isUpdate = false;
        } else {
            $this->form->store();
        }
        $this->dispatch('close-modal');
    }

    public function edit($id) {
        $this->isUpdate = true;
        $user = User::find($id);
        $this->editForm->set($user);
    }

    public function delete($id) {
        User::destroy($id);
    }

    public function create() {
        $this->isUpdate = false;
        $this->form->reset();
        $this->dispatch('open-modal');
    }
}
