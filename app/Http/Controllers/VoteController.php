<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('CreateVote');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'votetitle' => 'required|string|max:255',
            'content' => 'required|string|max:255',
        ]);
        
        $Vote = new Vote();
        $Vote->Title = $validated['votetitle'];
        $Vote->Content = $validated['content'];
        $Vote->Total_vote = 0;
        $Vote->Result = '尚未通過';

        $Vote->save();
        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('VotelistShow');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $vote = Vote::where('id','=',$request['VoteID'])->first();
        $vote->Total_vote+=1;

        $vote->save();
        return redirect(route('VotingRecord.store', ['VoteID' => $request['VoteID']]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
