<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class RoomTypeController extends Controller
{
    public function showIndex(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $roomTypes = RoomType::all();
        return view('admin.room_type.index', ['roomTypes' => $roomTypes]);
    }

    public function showCreate(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.room_type.create');
    }

    public function showStore(Request $request):RedirectResponse
    {
        $inputs = $request->all();
        $room_type = new RoomType();
        $room_type->fill($inputs);
        $room_type->save();
        return redirect()->route('room_type.showIndex');
    }
    public function showUpdate(RoomType $room_type): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.room_type.update', ['room_type' => $room_type]);
    }
    public function showSave(Request $request, RoomType $room_type): RedirectResponse
    {
        $inputs = $request->all();
        $room_type->fill($inputs);
        $room_type->save();
        return redirect()->route('room_type.showIndex');
    }
    public function destroy(RoomType $room_type): RedirectResponse
    {
        $room_type->delete();
        return redirect()->route('room_type.showIndex');
    }

}
