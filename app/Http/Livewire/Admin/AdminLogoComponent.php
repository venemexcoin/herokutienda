<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\LogoHome;

class AdminLogoComponent extends Component
{
    public function render()
    {
        $logos = LogoHome::all();
        return view('livewire.admin.admin-logo-component',['logos' => $logos])->layout('layouts.base');
    }
}
