<?php

namespace App\Livewire;

use Livewire\Component;

class Flashmessage extends Component
{   
    public $message;
    public $type;
    
    protected $listeners = ['refreshFlashMessage' => 'showMessage'];

    public function showMessage($success = null, $error = null)
    {
        $this->message = $success ?? $error;
        $this->type = $success ? 'success' : ($error ? 'error' : null);
    }
    

    public function render()
    {
        return view('livewire.flashmessage');
    }
}
