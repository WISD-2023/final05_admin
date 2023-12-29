<!-- 導入Forum Model -->
@php 
    use App\Models\Forum;   
    use App\Models\Article;
@endphp 

@if (Auth::check()) <!-- 判斷是否登入已決定要引入哪個導引列 -->
    @include('layouts.navigation_forum')
@else 
    @include('layouts.navigation01')
@endif

<x-app-layout>  <!-- 顯示是哪個討論區 -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$forumName}}
        </h2>
    </x-slot>

<!-- 用傳入的討論區名稱搜尋討論區，並建立變數以儲存討論區ID -->
@php   
    $Forum = Forum::where('forum_name','=',$forumName)->first();
    $ForumID = $Forum ? $Forum->id : 0;    
    $articles = Article::where('forum_id', $ForumID)->paginate(20);
@endphp

<!-- 顯示該討論區所有文章 -->
@foreach ($articles as $article)
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
{{ $articles->links() }}
</x-app-layout>
