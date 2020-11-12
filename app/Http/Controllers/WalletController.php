<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class walletController extends Controller
{
    public function add_wallet(Request $request)
    {
        $user = User::find($request->user_id);
        if(!$user){
            return response()->json(['message'=>'User Not Found'],404);
        }
        $this->validate($request,[
            'add_wallet'=>'required|integer',
        ]);
        User::where('id',$request->user_id)->increment('wallet', $request->add_wallet);
        return response()->json(['message'=>'Add Funds Success']);
    }

    public function reduce_wallet(Request $request)
    {
        $user = User::find($request->user_id);
        if(!$user){
            return response()->json(['message'=>'User Not Found'],404);
        }
        $this->validate($request,[
            'reduce_wallet'=>'required|integer',
        ]);
        User::where('id',$request->user_id)->decrement('wallet', $request->reduce_wallet);
        return response()->json(['message'=>'Reduce Funds Success']);
    }
}
