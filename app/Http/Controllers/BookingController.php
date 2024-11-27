<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use App\Models\RoomType;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class BookingController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        $bookings = Booking::all();
        return view('admin.booking.index',
            [
                'bookings' => $bookings
            ]
        );
    }

    public function showCreate(): View|Factory|Application
    {
        return view('admin.booking.create');
    }

    public function showUpdate(Booking $booking): View|Factory|Application
    {
        $rooms = Room::all();
        $roomTypes = RoomType::all();
        return view('admin.booking.update'
            , [
                'booking' => $booking,
                'rooms' => $rooms,
                'roomTypes' => $roomTypes
            ]
        );
    }

    public function postUpdate(Booking $booking, Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $inputs = $request->all();
            $booking->fill($inputs);
            $booking->save();
            DB::commit();
            return redirect()->route('booking.showIndex');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra');
        }
    }
}
