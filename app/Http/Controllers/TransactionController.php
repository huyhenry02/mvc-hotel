<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
        $bookings = Booking::all();
        return view('admin.transaction.create',
            ['bookings' => $bookings]);
    }

    public function showUpdate($id): View|Factory|Application
    {
        $transaction = Transaction::with('booking')->findOrFail($id);
        $bookings = Booking::all();
        return view('admin.transaction.update', compact('transaction', 'bookings'));
    }

    public function postCreate(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $transaction =  new Transaction();
            $transaction->fill($input);
            $transaction->save();

            $booking = Booking::findOrFail($input['booking_id']);
            $booking->payment_status = Booking::STATUS_PAID;
            $booking->save();
            DB::commit();
            return redirect()->route('transaction.showIndex');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra');
        }
    }

    public function postUpdate(Transaction $transaction, Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $transaction->fill($input);
            $transaction->save();
            DB::commit();
            return redirect()->route('transaction.showIndex');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra');
        }
    }
}
