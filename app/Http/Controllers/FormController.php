<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    //
    public function submitForm(Request $request)
    {
        $this->res = ['status'=>false,'message'=>'Invalid Request.','errors'=>[],'data'=>[],'status_code'=>200];

        $this->validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1|max:100',
            'email' => 'required|email|max:150',
        ]);

        $contact = Contact::create([
            "name" => $request->name,
            "email" => $request->email,
        ]);

        $this->res['data']=$contact; 
        $this->res['message']="Data saved successfully"; 
        $this->res['status'] = true;

        return response()->json($this->res,200);
    }
}
