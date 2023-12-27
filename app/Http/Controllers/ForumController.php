<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Forum;

class ForumController extends Controller
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
        return view('CreateForum');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'ForumName' => 'required|string|max:255',
        ]);

        $result = Forum::where('forum_name', $validated['ForumName'])->exists();

        if($result){
            return redirect()->route('Forum.create')->withErrors(['ForumName' => '該論壇名稱已經存在。']);
        }
        else{
            $forum = new Forum();
            $forum->forum_name = $validated['ForumName'];
            $forum->number_of_forum = 0;
    
            $forum->save();
    
            return redirect(route('dashboard'));
        }        
    }

    /**
     * Display the specified resource.
     */
    public function show($forumName)
    {
        return view('Forum', ['forumName' => $forumName]);
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
    public function destroy(Request $request): RedirectResponse
    {
        $forumId = (int)($request['ForumID']);
        $forumName = $request['ForumName'];
        $forum = Forum::find($forumId);
        if($forum->forum_name == $forumName){
            $forum->delete();
            return redirect(route('dashboard'));
        }
        else{
            return redirect(route('dashboard'));
        }        
    }
}
