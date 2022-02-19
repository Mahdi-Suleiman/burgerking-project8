<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;
class ProfileController extends Controller
{
public function profile()
{
    return view('users.user-profile');
}



    public function update(Request $request)
    {
    $user_id=Auth::user()->id;
    $user=User::findOrFail($user_id);
    $user->name=$request->input('name');
    $user->password=$request->input('password');
    $user->tables->pivot->mobile_number=$request->input('mobile_number');


    $user->update();
    return redirect()->back()->with('status profile updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
