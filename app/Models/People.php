<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    private static $people;

    public static function createUser($request)
    {
        self::$people = new People();
        self::$people->name = $request->name;
        self::$people->email = $request->email;
        self::$people->number = $request->number;
        self::$people->password = bcrypt($request->password);
        self::$people->save();
    }
}
