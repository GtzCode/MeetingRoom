<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room; 
use App\Models\reservation; 
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $RoomId =  $request->get(key:'RoomID');
        $timestampBegin = $request->get(key:'DataBegin');
        $timestampEnd =$request->get(key:'DataEnd');
        $Result = ((strtotime($timestampEnd) - strtotime($timestampBegin))/60)/60;

        $validData = $request->validate([
            'DataBegin' => 'required',
            'DataEnd' => 'required',
        ]);

        $ReservationBetween = DB::table('reservations')
        ->whereBetween('BEGINDATE', [$timestampBegin, $timestampEnd])
                ->get();

        $Available = count($ReservationBetween);

        if($Available != 0){
            return back()->withErrors("There is a reservation between that time");
        }

        if($Result <= 2){

        $Reservation = new reservation();
        $Reservation->USER_ID = auth()->user()->id;
        $Reservation->ROOM_ID = $RoomId;
        $Reservation->BEGINDATE =  $timestampBegin;
        $Reservation->ENDDATE =  $timestampEnd;
        $Reservation->FREE =  false;
        $Reservation->save();
        return redirect(to:"/room/$RoomId/RoomReservation");
        } else {
            return back()->withErrors("You  can't reserve more two hours");
        }
            
        

  
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Room = Room::findOrFail($id);
        return view('Reservation.Create',['Room' => $Room]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Reservation = reservation::find($id);
        $Reservation->delete();
        return redirect(to:"/room");
    }

    public function ConfirmDelete($id) 
    {
        $Reservation = reservation::find($id);
        return view('Reservation.ConfirmDelete',['Reservation' => $Reservation]);
    }
    public function ConfirmFinish($id) 
    {
        $Reservation = reservation::find($id);
        return view('Reservation.ConfirmFinish',['Reservation' => $Reservation]);
    }

    public function Finish($id) 
    {
        $Reservation = reservation::find($id);
        if($Reservation->ENDDATE > date("Y-m-d H:i:s"))
        {
            $Reservation->ENDDATE =  date("Y-m-d H:i:s");
            $Reservation->FREE =  true;
            $Reservation->save();
        }
        return redirect(to:'/room');
        
    }
    
}
