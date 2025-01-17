<?php

namespace App\Livewire\Position;

use App\Livewire\Forms\Position\PositionForm;
use App\Models\Position;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class PositionList extends Component
{
    use WithPagination;

    public PositionForm $form;
    public $isUpdate = false;
    
    #[Computed()]
    public function positions() {
        return Position::paginate(10);
    }

    public function render()
    {
        return view('livewire.position.position-list')
            ->layoutData([
                'title' => 'Jabatan',
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
        $unit = Position::find($id);
        $this->form->setUnit($unit);
    }

    public function delete($id) {
        Position::destroy($id);
    }

    public function create() {
        $this->isUpdate = false;
        $this->form->reset();
        $this->dispatch('open-modal');
    }
}
