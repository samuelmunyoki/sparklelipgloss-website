<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cache;

class UserController extends Controller
{
    public function userOnlineStaus()
    {
        $users = DB::table('users')->get();
        foreach($users as $user)
        {
            if(Cache::has('user-is-online-' .$user->id))
                echo "User ".$user->name. " is online";
            else
                echo "User ".$user->name. " is offline";
        }
    }
}
