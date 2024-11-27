<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Booking;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class IndexController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        $roomTypes = RoomType::all();
        return view('customer.index'
            , ['roomTypes' => $roomTypes]
        );
    }

    public function showAbout(): View|Factory|Application
    {
        return view('customer.about');
    }
    public function showRoom(): View|Factory|Application
    {
        $roomTypes = RoomType::all();
        return view('customer.room'
            , ['roomTypes' => $roomTypes]
        );
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
        $roomTypes = RoomType::all();
        return view('customer.booking',
            ['roomTypes' => $roomTypes]
        );
    }

    public function showYourBooking(): View|Factory|Application
    {
        $bookings = Booking::where('user_id', auth()->id())->get();
        return view('customer.your_booking',
            ['bookings' => $bookings]
        );
    }

    public function postBooking(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['user_id'] = auth()->id();
            $price_room = RoomType::find($input['room_type_id'])->price;
            $check_in_date = Carbon::parse($input['check_in_date']);
            $check_out_date = Carbon::parse($input['check_out_date']);
            $days = $check_in_date->diffInDays($check_out_date);
            $input['total_price'] = $price_room * $days;
            $input['payment_status'] = 'pending' ;
            $booking = new Booking();
            $booking->fill($input);
            $booking->save();

            $booking->code = 'BOOKING-00' . $booking->id;
            $booking->save();
            DB::commit();
            return redirect()->route('customer.showIndex')->with('success', 'Đặt phòng thành công');
        }catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
