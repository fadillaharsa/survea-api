<?php

namespace App\Http\Controllers;
use App\Models\Fillform;
use Illuminate\Http\Request;

class FillformController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create (Request $request) {
        $this->validate($request,[
            'user_id'=>'required|integer',
            'form_id'=>'required|integer',
            'status'=>'required|string',
        ]);
        $data = $request->all();
        $fillform = Fillform::create($data);
        return response()->json($fillform);
    }

}
