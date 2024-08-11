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
            'status' => 1,
        ]);
        session()->flash('success', 'Room created successfully');
        return redirect()->back();
    }

    public function enterRoom($room)
    {
        $room_object = Room::where('name', $room)->first();
        return view('enter-room', compact('room','room_object'));
    }

    public function enterRoomPost(Request $request, $room)
    {
        $password = $request->password;

        if (Room::where('name', $room)->where('password', $password)->first()) {
            return redirect('https://e.almajd.link/'.$room);
        } else {
            session()->flash('error', 'Invalid password');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $room = Room::find($id);
        if($room) {
            $room->delete();
            return response()->json(['message' => 'Room deleted successfully','status'=>'success'], 200);
        } else {
            return response()->json(['message' => 'Room not found','status'=>'error'], 404);
        }
    }

    public function toggleStatus($id)
    {
        $room = Room::find($id);
        if($room) {
            $room->status = !$room->status; // This toggles the status
            $room->save();
            return response()->json(['message' => 'Room status updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Room not found'], 404);
        }
    }

    public function checkRoom(Request $request)
    {
        $password = $request->password;
        $room = $request->room;

        if (Room::where('name', $room)->where('password', $password)->first()) {
            return response()->json(['message' => 'Room found','status'=>'success'], 200);
        } else {
            return response()->json(['message' => 'Room not found','status'=>'error'], 404);
        }

    }

    public function test()
    {
        return response()->json(['message' => 'Test route working','status'=>'success'], 200);
    }
}
