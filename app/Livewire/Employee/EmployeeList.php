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
    public $unitSearchValue = '';
    public $showAddUnit = false;
    public $positionSearchValue = '';
    public $showAddPosition = false;
    
    #[Computed()]
    public function users() {
        return User::with(['unit', 'positions'])->paginate(10);
    }

    #[Computed()]
    public function units() {
        $unit = Unit::query();
        if ($this->unitSearchValue != '') {
            $unit->where('name', 'like', '%' . $this->unitSearchValue . '%');
        }
        $unit = $unit->get();
        if ($unit->isEmpty()) {
            $this->showAddUnit = true;
        }
        return $unit;
    }

    #[Computed()]
    public function positions() {
        $position = Position::query();
        if ($this->unitSearchValue != '') {
            $position->where('name', 'like', '%' . $this->positionSearchValue . '%');
        }
        $position = $position->get();
        if ($position->isEmpty()) {
            $this->showAddPosition = true;
        }
        return $position;
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

    public function searchUnit(string $value = '')
    {
        $this->unitSearchValue = $value;        
    }

    public function searchPosition(string $value = '')
    {
        $this->positionSearchValue = $value;  
        dd('meju');      
    }
}
