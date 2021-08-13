<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LogoHome;


class LogoComponent extends Component
{
    public function render()
    {
        $logo = LogoHome::find(1);    
        return view('livewire.logo-component', ['logo' => $logo]);
    }
}
