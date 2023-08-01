<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Livewire\Users;

class UsersController extends Controller
{
    public function users ()
    {
        return view('account.users');
    }
}
