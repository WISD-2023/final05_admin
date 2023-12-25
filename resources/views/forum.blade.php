@php 
use App\Models\Forum;
@endphp 
@if (Auth::check()) 
    @include('layouts.navigation_forum')
@else 
    @include('layouts.navigation01')
@endif
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$forumName}}
        </h2>
    </x-slot>
@php 
    $Forum = Forum::where('forum_name','=',$forumName)->first();
    $ForumID = $Forum ? $Forum->id : 0;
@endphp
@foreach (\App\Models\Article::where('forum_id','=',$ForumID)->get() as $article)
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{url('Article/' . $article->Name)}}">{{ $article->Name }}</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
</x-app-layout>
