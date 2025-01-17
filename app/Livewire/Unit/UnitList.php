<?php

namespace App\Livewire\Unit;

use App\Livewire\Forms\Unit\UnitForm;
use App\Models\Unit;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class UnitList extends Component
{
    use WithPagination;

    public UnitForm $form;
    public $isUpdate = false;
    
    #[Computed()]
    public function units() {
        return Unit::paginate(10);
    }

    public function render()
    {
        return view('livewire.unit.unit-list')
            ->layoutData([
                'title' => 'Unit',
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
        $unit = Unit::find($id);
        $this->form->setUnit($unit);
    }

    public function delete($id) {
        Unit::destroy($id);
    }

    public function create() {
        $this->isUpdate = false;
        $this->form->reset();
        $this->dispatch('open-modal');
    }
}
