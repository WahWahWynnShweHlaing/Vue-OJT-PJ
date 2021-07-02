<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
   {
       $users = User::get();
       return response()->json($users);

   }

   public function logintest(Request $request)
   {
       $request->validate([
           'email' => 'required|email|exists:users,email',
           'password' => 'required',
       ]);
      
       log::info($request);
       $credentials = $request->only('email', 'password');
       if (Auth::attempt($credentials)) {
           return response()->json($credentials);
           $request->session()->put('current_user', Auth::user());
       }
   }
 

    /**
     * 
     *  user store
     *  */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'type' => 'required',
            'phone' => 'required',
            'DOB' => 'required',
            'address' => 'required',
        ]);
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile' => $request->profile,
            'type' => $request->type,
            'phone' => $request->phone,
            'DOB' => $request->DOB,
            'address' => $request->address,
            'create_user_id' => 1,
            'updated_user_id' => 1,
            'deleted_user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

       
    }

    public function passstore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
       
        $current_user = request()->session()->get('current_user');
        DB::table('users')
          ->where('id', $current_user->ID)
          ->update([
            'password' => Hash::make($request->new_password),
         ]);

        //  return response()->json($users);
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\User  $users
    * @return \Illuminate\Http\Response
    */
    public function show($id)
   {  
       $user = User::where('id', $id)->first();
       return response()->json($user);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\User  $users
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, User $user)
   {
  
       $user->fill($request->post())->save();
       return response()->json([
           'message'=>'User Updated Successfully!!',
           'users'=>$user
       ]);
   }
   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\User  $users
    * @return \Illuminate\Http\Response
    */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'message'=>'User Deleted Successfully!!'
        ]);
    }
    

    /**
     * 
     * name search 
     * 
     * */
    public function usersearch(Request $request)
    {
        
        Log::info($request->keyword);
        $users = User::query()
            ->where('name', 'LIKE', "%$request->keyword%")
            ->orWhere('email', 'LIKE', "%$request->keyword%")
            ->orWhere('created_at', 'LIKE', "%$request->keyword%")
            ->orWhere('updated_at', 'LIKE', "%$request->keyword%")
            ->get();

        return response()->json($users);

    }

}
