<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

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
}
