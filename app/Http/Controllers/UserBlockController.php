<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Member;

class UserBlockController extends Controller
{
    public function block(Request $request): RedirectResponse
    {
        $AccID = $request['AccID'];

        $user = Member::find($AccID);
        $user->is_blocked = true;
        $user->save();
        return redirect(route('Blacklisted.store',['userID'=>$AccID]));
    }

    public function Unblock(Request $request): RedirectResponse
    {
        $userId = $request['userId'];

        $user = Member::find($userId);
        $user->is_blocked = false;
        $user->save();
        return redirect(route('Blacklisted.show'));   
    }
}
