<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class IndexController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        return view('customer.index');
    }

    public function showAbout(): View|Factory|Application
    {
        return view('customer.about');
    }
    public function showRoom(): View|Factory|Application
    {
        return view('customer.room');
    }

    public function showContact(): View|Factory|Application
    {
        return view('customer.contact');
    }

    public function showService(): View|Factory|Application
    {
        return view('customer.service');
    }

    public function showBooking(): View|Factory|Application
    {
        return view('customer.booking');
    }
    public function showTeam(): View|Factory|Application
    {
        return view('customer.team');
    }
    public function showTestimonial(): View|Factory|Application
    {
        return view('customer.testimonial');
    }
}
