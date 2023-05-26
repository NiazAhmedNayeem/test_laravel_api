<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Session;

class PeopleAuthController extends Controller
{
    private $people;
    public function index()
    {
        return view('people.login');
    }
    public function login(Request $request)
    {
        $this->people = People::where('number', $request->number)->first();
        if ($this->people)
        {
            if (password_verify($request->password, $this->people->password))
            {
                Session::put('id', $this->people->id);
                Session::put('name', $this->people->name);
                Session::put('email', $this->people->email);
                return redirect('/dashboard');
            }
            else
            {
                return redirect()->back()->with('message', 'Sorry your password is not valid.');
            }
        }
        else
        {
            return redirect()->back()->with('message', 'sorry your Phone number is not valid.');
        }
    }
    public function register()
    {
        return view('people.reg');
    }
    public function create(Request $request)
    {
        People::createUser($request);
        return redirect('/login')->with('message', 'Register Successfully, Now You can Login, Thank You.');
    }
}
