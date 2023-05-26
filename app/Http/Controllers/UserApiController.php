<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Validator;

class UserApiController extends Controller
{
    public function showPeople($id=null)
    {
        if ($id=='')
        {
            $people = People::get();
            return response()->json(['people' => $people], 200);
        }
        else
        {
            $people = People::get($id);
            return response()->json(['people' => $people], 200);
        }
    }
    public function addPeople(Request $request)
    {
        if ($request->ismethod('post'))
        {
            $data = $request->all();
//            return $data;

////Validation start here
//            $rules = [
//                'name' => 'required',
//                'email' => 'required|email|unique:people',
//                'number' => 'required|number|unique:people',
//                'password' => 'required'
//            ];
//
//            $customMessage = [
//                'name.required' => 'Name is Required.',
//                'email.required' => 'Email is Required.',
//                'email.email' => 'Must be a valid mail.',
//                'number.required' => 'Number is Required.',
//                'number.number' => 'Must be a valid number.',
//                'password.required' => 'Password is Required.'
//            ];
//
//            $validator = Validator::make($data,$rules,$customMessage);
//            if ($validator->fails())
//            {
//                return  response()->json($validator->errors(),422);
//            }
////Validation end here

            $people = new People();
            $people->name = $data['name'];
            $people->email = $data['email'];
            $people->number = $data['number'];
            $people->password = bcrypt($data['password']);
            $people->save();
            $message = 'People Successfully Added';
            return response()->json(['message' => $message], 201);
        }
    }
}
