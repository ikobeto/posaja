<?php

namespace App\Livewire\components;

use Livewire\Component;

class Basicmodal extends Component
{
    public $modalId;
    public $title;
    public $size = ''; // '', 'modal-lg', 'modal-xl', 'modal-sm'
    
    protected $listeners = [
        'showBootstrapModal' => 'show',
        'hideBootstrapModal' => 'hide'
    ];

    public function mount($modalId = 'bootstrapModal')
    {
        $this->modalId = $modalId;
    }

    public function show($title = '', $size = '')
    {
        $this->title = $title;
        $this->size = $size;
        $this->dispatchBrowserEvent('show-bootstrap-modal', ['modalId' => $this->modalId]);
    }

    public function hide()
    {
        $this->dispatchBrowserEvent('hide-bootstrap-modal', ['modalId' => $this->modalId]);
    }
    
    public function render()
    {
        return view('livewire.basicmodal');
    }
}
