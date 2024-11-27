<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class RoomController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        $rooms = Room::with('roomType')->get();
        return view('admin.room.index', ['rooms' => $rooms]);
    }

    public function showCreate(): View|Factory|Application
    {
        $roomtypes = RoomType::all();
        return view('admin.room.create', compact('roomtypes'));
    }

    public function postCreate(Request $request): RedirectResponse
    {
        $inputs = $request->all();
        $room = new Room();
        $room->fill($inputs);
        $room->save();
        return redirect()->route('room.showIndex');
    }
    public function showUpdate($id): View|Factory|Application
    {
        $room = Room::findOrFail($id);
        $roomtypes = RoomType::all();
        return view('admin.room.update', compact('room', 'roomtypes'));
    }
    public function postUpdate(Request $request, Room $room): RedirectResponse
    {
        $inputs = $request->all();
        $room->fill($inputs);
        $room->save();
        return redirect()->route('room.showIndex');
    }
    public function destroy(Room $room): RedirectResponse
    {
        $room->delete();
        return redirect()->route('room.showIndex');
    }
}
