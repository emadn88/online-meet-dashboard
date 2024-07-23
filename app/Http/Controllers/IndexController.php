<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        $rooms = Room::all();
        return view('index',compact('rooms'));
    }

    public function createRoom(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|string|max:255|unique:rooms,name',
                'password' => 'required|string|max:255',
                'mobile' => 'required',
            ]
        );

        $room_name = strtoupper(str_replace(' ', '', $data['name']));
        $password = $data['password'];
        $room = Room::create([
            'name' => $room_name,
            'password' => $password,
            'mobile' => $data['mobile'],
        ]);
        session()->flash('success', 'Room created successfully');
        return redirect()->back();
    }

    public function enterRoom($room)
    {
        return view('enter-room', compact('room'));
    }

    public function enterRoomPost(Request $request, $room)
    {
        $password = $request->password;

        if (Room::where('name', $room)->where('password', $password)->first()) {
            return redirect('https://tarteel.store/'.$room);
        } else {
            session()->flash('error', 'Invalid password');
            return redirect()->back();
        }
    }
}
