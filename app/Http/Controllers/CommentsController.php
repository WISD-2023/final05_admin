<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'Content' => 'required|string|max:255',
        ]);

        $comment = new Comments();
        $comment->members_id = Auth::user()->id;
        $comment->article_id = $request['ArticleID'];
        $comment->Content = $validated['Content'];
        
        $comment->save();  
        $ArticleName = $request['ArticleName'];
        return redirect(route('Article', ['articleName' => $ArticleName]));
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
    public function edit(Request $request) :view
    {
        $commentID = $request['CommentID'];
        $commentContent = $request['CommentContent'];
        return view('CommentEdit',[
            'commentID' => $commentID,
            'commentContent' => $commentContent,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'Content' => 'required|string|max:255',
        ]);
        //CommentID
        $Comment = Comments::Where('id','=',$request['CommentID'])->first();
        $Comment->update($validated);
        $Article = Article::Where('id','=',$Comment->article_id)->first();
        return redirect(route('Article', ['articleName' => $Article->Name]));
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $Comment = Comments::Where('id','=',$request['CommentID'])->first();
        $Article = Article::Where('id','=',$Comment->article_id)->first();
        $Comment->delete();
        return redirect(route('Article', ['articleName' => $Article->Name]));
    }
}
