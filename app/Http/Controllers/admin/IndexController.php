<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Table;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $reservations = Table::find(1);
        // dd($reservations->users->mobile_number);
        // $users = User::all()->where('role', 'user')->with('user.table');
        // dd($users->tables->first());
        // dd($users);


        // $user = $users->find(2);
        // dd($user);

        // $allStatus = $user->tables()->pluck('status');
        // dd($allStatus);


        // $table = Table::create(['']);
        // $table->users()->attach('1', ['user_id' => '2', 'table_id' => '1', 'mobile_number' => '0788679455', 'guest_number' => '4', 'datetime' => '2022-02-20 09:22:20']);
        $users = User::with('tables')->where('role', 'user')->get();
        $allStatus = ['pending', 'accepted', 'rejected'];
        // dd($allStatus);
        return view('layouts.admin.index', compact('users', 'allStatus'));
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
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $userId, $pivotId)
    {
        //
        // dd($request->mobile_number);
        $users = User::with('tables')->where('role', 'user')->get();
        $user = $users->find($userId);
        // $user->tables()->wherePivot('id', '=', $pivotId)->attach($pivotId, [
        //     "user_id" => $request->user_id,
        //     "table_id" => $request->table_id,
        //     "mobile_number" => $request->mobile_number,
        //     "guest_number" => $request->guest_number,
        //     "status" => $request->status,
        //     "datetime" => $request->datetime
        // ]);
        $user->tables()->wherePivot('id', '=', $pivotId)->updateExistingPivot($request->table_id, [
            "user_id" => $request->user_id,
            "table_id" => $request->table_id,
            "mobile_number" => $request->mobile_number,
            "guest_number" => $request->guest_number,
            "status" => $request->status,
            "datetime" => $request->datetime
        ]);
        // $user->tables()->wherePivot('id', '=', $pivotId)->detach();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId, $pivotId)
    {
        //
        // dd($id);
        // $users = User::all();
        // $users->tables()->wherePivot('id',  $id)->detach();
        // dd($user->tables()->wherePivot('id', '=', $id)->detach());
        // $users->tables()->wherePivot('id', '=', $id)->delete();
        // $users->tables()->detach($id);
        // $users->deleteOrFail()
        // dd($pivotId);
        $users = User::with('tables')->where('role', 'user')->get();
        $user = $users->find($userId);
        $user->tables()->wherePivot('id', '=', $pivotId)->detach();
        return redirect()->back();
        // $visits->products()->wherePivot('product_id', '=', $product_id)->detach();
    }
}