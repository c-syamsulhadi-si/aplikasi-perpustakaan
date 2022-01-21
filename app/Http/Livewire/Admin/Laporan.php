<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Laporan extends Component
{
    public function render()
    {
        return view('livewire.admin.laporan', [
            'kategori_' => \App\Models\Kategori::all(),
        ]);
    }
}