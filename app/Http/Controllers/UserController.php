<?php

namespace App\Http\Controllers;

use App\Models\UserPlant;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){
        validator(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ])->validate();

        if(auth()->attempt(request()->only(['email', 'password']))){
            return redirect('/');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid Credentials!']);
    }

    public function logout(){
        auth()->logout();

        return redirect('/');
    }

    public function add_user_plant(Request $request){
        $user = auth()->user();
        
        $userplant = new UserPlant;
        $userplant -> user_id = $user->id;
        $userplant -> plant_name = $request->plant;
        $userplant -> label = $request->label;
        $userplant -> save();
    }

    public function search_user_plant(Request $request){
        $query = $request->q;

        $data = UserPlant::where('user_id', '=', auth()->user()->id)
                ->where('plant_name', 'like', '%'.$query.'%')
                ->orWhere('user_id', '=', auth()->user()->id)
                ->where('label', 'like', '%'.$query.'%')->get();
        
        return view('pages.templates.my-plants.search', ['data' => $data]);
    }
}
