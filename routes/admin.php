<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Area\AreaComponent;

Route::get('areas',AreaComponent::class)->name('areas');