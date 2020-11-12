<?php

namespace App\Http\Controllers;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $form = Form::all();
        return response()->json($form);
    }

    public function show($id){
        $form = Form::find($id);
        return response()->json($form);
    }

    public function filter($category){
        $form = Form::where('category',$category)->get();
        return response()->json($form);
    }

    public function myform($id){
        $form = Form::where('user_id',$id)->get();
        return response()->json($form);
    }

    public function create (Request $request) {
        $this->validate($request,[
            'user_id'=>'required|integer',
            'title'=>'required|string',
            'description'=>'required|string',
            'category'=>'required|string',
            'link'=>'required|string',
            'target_max_age'=>'integer',
            'target_min_age'=>'integer',
            'target_persona'=>'string',
            'responses_link'=>'string',
            'points'=>'required'
        ]);
        $data = $request->all();
        $form = Form::create($data);
        return response()->json($form);
    }

    public function update (Request $request,$id){
        $form = Form::find($id);
        if(!$form){
            return response()->json(['message'=>'Form Not Found'],404);
        }
        $this->validate($request,[
            'user_id'=>'required|integer',
            'title'=>'required|string',
            'description'=>'required|string',
            'category'=>'required|string',
            'link'=>'required|string',
            'target_max_age'=>'integer',
            'target_min_age'=>'integer',
            'target_persona'=>'string',
            'response_link'=>'string'
        ]);
        $data = $request->all();
        $form->fill($data);
        $form->save();
        return response()->json($form);
    }

    public function destroy ($id){
        $form = Form::find($id);
        if(!$form){
            return response()->json(['message'=>'Form Not Found'],404);
        }
        $form->delete();
        return response()->json(['message'=>'Form Deleted']);
    }

}
