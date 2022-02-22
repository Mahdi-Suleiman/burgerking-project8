<?php

namespace App\Http\Controllers;

use App\Models\Table;
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
    $user_id=Auth::user();
    // $user=User::findOrFail($user_id);
    $user_id->name=$request->input('name');
    // $user_id->password=$request->input('password');
    // $user_id->tables->pivot->mobile_number=$request->input('mobile_number');
    // $user_id->password=$request->user()->fill([
    //     'password' => Hash::make($request->newPassword)
    // ])->save();
    if ($request->input('password')!=null){
          $user_id->password=$request->input('password');
$user_id->password = Hash::make($user_id['password']);

    }



    $user_id->update();
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
    public function destroy($pivotId)
    { $user_id=Auth::user();
        // $user = User::find($user_id);
        $user_id->tables()->wherePivot('id', '=', $pivotId)->detach();


        return redirect()->back();
    }
}
