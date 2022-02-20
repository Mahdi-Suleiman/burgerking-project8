<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
public function profile()
{
     $user_id=Auth::user()->id;
     $user=User::find($user_id);
    // dd($user);
    return view('users.user-profile',compact('user'));
}



    public function update(Request $request)
    {
    $user_id=Auth::user()->id;
    $user=User::findOrFail($user_id);
    $user->name=$request->input('name');
    // $user->password=$request->input('password');
    // $user->tables->pivot->mobile_number=$request->input('mobile_number');
    // $user->password=$request->user()->fill([
    //     'password' => Hash::make($request->newPassword)
    // ])->save();
    if ($request->input('password')!=null){
          $user->password=$request->input('password');
$user->password = Hash::make($user['password']);
 
    }



    $user->update();
    $request->flash();
        session()->flash('success', 'Your profile updated successfully.');
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
