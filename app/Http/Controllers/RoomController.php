<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class RoomController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        return view('admin.room.index');
    }

    public function showCreate(): View|Factory|Application
    {
        return view('admin.room.create');
    }

    public function showUpdate(): View|Factory|Application
    {
        return view('admin.room.update');
    }
}
