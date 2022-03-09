<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room; 
use App\Models\reservation; 
use App\Models\User; 
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Rooms = DB::table('ROOMS')
                ->where('DELETE', '=', FALSE)
                ->get();

                $Reservation = DB::table('reservations')
                ->where('FREE', '=', false)
                ->where('ENDDATE', '<',date("Y-m-d H:i:s"))
                ->update(['FREE' => true]);

    return view('Room.index',['rooms' =>  $Rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('Room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'NAME' => 'required|min:5'
        ]);
        
        $Room = new Room();
        $Room->NAME =  $request->get(key:'NAME');
        $Room->save();

        return redirect(to:'/room');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $Room = Room::find($id);
        $Reservations = Room::find($id)->reservation;
        $ReservationsUser = $Reservations->where('USER_ID','=',auth()->user()->id);

        return view('Room.ShowRomReservation',[
            'Reservations' => $ReservationsUser,
            'Room' =>$Room
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Room = Room::findOrFail($id);
        return view('Room.edit',['room' => $Room]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Room = Room::find($id);
        $Room->NAME =  $request->get(key:'NAME');
        $Room->save();
        return redirect(to:'/room');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Room = Room::find($id);
        $Room->DELETE = true;
        $Room->save();
        return redirect(to:'/room');

    }

    public function ConfirmDelete($id){
        $Room = Room::find($id);
        return view('Room.ConfirmDelete',['room' => $Room]);
    }
}
