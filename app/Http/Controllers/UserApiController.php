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
            $rules = [
                'name' => 'required',
                'email' => 'required|email|unique:people',
                'number' => 'required|number|unique:people',
                'password' => 'required'
            ];

            $customMessage = [
                'name.required' => 'Name is Required.',
                'email.required' => 'Email is Required.',
                'email.email' => 'Must be a valid mail.',
                'number.required' => 'Number is Required.',
                'number.number' => 'Must be a valid number.',
                'password.required' => 'Password is Required.'
            ];

            $validator = Validator::make($data,$rules,$customMessage);
            if ($validator->fails())
            {
                return  response()->json($validator->errors(),422);
            }
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
    public function addMultiplePeople(Request $request)
    {
        if ($request->ismethod('post'))
        {
            $data = $request->all();
            foreach ($data['people'] as $addPeople)
            {
                $people = new People();
                $people->name = $addPeople['name'];
                $people->email = $addPeople['email'];
                $people->number = $addPeople['number'];
                $people->password = bcrypt($addPeople['password']);
                $people->save();
                $message = 'People Successfully Added';
            }
            return response()->json(['message' => $message], 201);
        }
    }
    public function updatePeopleDetail(Request $request, $id)
    {
        if ($request->ismethod('put'))
        {
            $data = $request->all();

            $people = People::find($id);
            $people->name = $data['name'];
            $people->email = $data['email'];
            $people->number = $data['number'];
            $people->password = bcrypt($data['password']);
            $people->save();
            $message = 'Detail update successfully, Thank You.';
            return response()->json(['message' => $message], 202);
        }
    }
    public function updateSingleRecord(Request $request, $id)
    {
        if ($request->ismethod('patch'))
        {
            $data = $request->all();

            $people = People::find($id);
            $people->name = $data['name'];
            $people->save();
            $message = 'Record update successfully, Thank You.';
            return response()->json(['message' => $message], 202);
        }
    }
    public function deleteUserRecord($id=null)
    {
        People::findOrFail($id)->delete();
        $message = 'Delete user successfully, Thank you.';
        return response()->json(['message' => $message], 200);
    }
    public function deleteUserRecordWithJson(Request $request)
    {
        if($request->isMethod('delete'))
        {
            $data = $request->all();
            People::where('id', $data['id'])->delete();
            $message = 'Delete user record with json is successfully, Thank you.';
            return response()->json(['message' => $message], 200);
        }
    }
    public function deleteMultipleUserRecord($ids)
    {
        $ids = explode(',',$ids);
        People::whereIn('id',$ids)->delete();
        $message = 'Delete multiple user successfully, Thank you.';
        return response()->json(['message' => $message], 200);
    }
}
