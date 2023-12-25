<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\voting_record;
use Illuminate\Support\Facades\Auth;
class VotingRecordController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $voting_record = new voting_record();
        $voting_record->members_id = Auth::user()->id;
        $voting_record->vote_id = $request['VoteID'];
        $voting_record->Selection = '同意';

        $voting_record->save();
        return view('VotelistShow');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
