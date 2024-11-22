<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class BookingController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        return view('admin.booking.index');
    }

    public function showCreate(): View|Factory|Application
    {
        return view('admin.booking.create');
    }

    public function showUpdate(): View|Factory|Application
    {
        return view('admin.booking.update');
    }
}
