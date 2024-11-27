<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class TransactionController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        $transactions = Transaction::all();
        return view('admin.transaction.index',
            ['transactions' => $transactions]);
    }

    public function showCreate(): View|Factory|Application
    {
        return view('admin.transaction.create');
    }

    public function showUpdate($id): View|Factory|Application
    {
        $transaction = Transaction::with('booking')->findOrFail($id);
        $bookings = Booking::all();
        return view('admin.transaction.update', compact('transaction', 'bookings'));
    }
}
