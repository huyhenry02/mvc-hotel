<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class UserController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        $users = User::all();
        return view('admin.user.index',['users'=>$users]);
    }

    public function showCreate(): View|Factory|Application
    {
        return view('admin.user.create');
    }

    public function showUpdate(User $user): View|Factory|Application
    {
        return view('admin.user.update', ['user'=>$user]);
    }
}
