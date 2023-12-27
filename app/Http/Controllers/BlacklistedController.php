<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\blacklisted;
use Illuminate\Support\Facades\Http;

class BlacklistedController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $memberID = $request['userID'];
        $BlackListed = new blacklisted();
        $BlackListed->members_id = $memberID;

        $BlackListed->save();
        session()->flash('successMessage', '封鎖成功');
        return redirect(route('Report.show'));
    }
    public function show()
    {
        return view('blacklisted');
    }
    public function destroy(Request $request)
    {
        $userId = ($request['BlackID']);
        $blacklisted = blacklisted::Where('members_id','=',$userId);
        $blacklisted->delete();

       
        return redirect(route('UserBlock.Unblock',['userId' => $userId]));   
    }

}
//