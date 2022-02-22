<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Auth::check()==false){
        //     return redirect('/login');
        // }
        // $user_id=Auth::user()->id;
        // $user=User::find($user_id);

        $tables = Table::all();
        return view('book', compact('tables'));
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
    public function store(Request $request, Table $table)
    {
        if (Auth::check()) {
            // $tables = DB::table('table_user')->where('table_id', $table->id)->get();
            $tables = Table::with('users')->get();
            // dd($tables);
            $error = false;
            foreach ($tables as $onetable) {

                foreach ($onetable['users'] as $order) {

                    $date = $order['pivot']->date;

                    $time = $order['pivot']->time;
                    $table_id = $order['pivot']->table_id;

                    if ($request->date == $date && $request->time == $time && $request->number == $table_id) {
                        // $error=true;
                        $request->flash();
                        session()->flash('success', 'this Reservation
                    is already booked.');
                        return redirect()->back();
                    }
                }
            }
            if (!$error) {
                $table = Table::find($request->number);
                $id = Auth::user()->id;
                $table->users()->attach(
                    $id,
                    [
                        'mobile_number' => $request->mobile_number,
                        'guest_number' => $request->guest_number,
                        'time' => $request->time,
                        'date' => $request->date,
                        'note' => $request->note
                    ]
                );
                $request->flash();
                session()->flash('success', 'Thank you ..you can check your profile to know your Reservation
       status.');
                return redirect()->back();
            }
        } else {
            return redirect('/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        //
    }
}