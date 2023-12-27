@php
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use App\Models\User;
@endphp
@if (Auth::check())
    @include('layouts.navigation_article')
@else
    @include('layouts.navigation01')
@endif
<x-app-layout>
    <x-slot name="header"> <!--文章標題-->
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$articleName}}
        </h2>
    </x-slot>
    <div class="py-12"> <!--文章內容-->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 text-gray-900 flex">
                    @php
                    $article = Article::where('Name','=',$articleName)->first();
                    $ArticleID = $article->id;
                    $ArticleName = $article->Name;
                    if(Member::find($article->members_id)){
                        $member = Member::find($article->members_id);
                    }
                    else if(User::find($article->members_id)){
                        $member = User::find($article->members_id);
                    }
                    else{

                    }                   
                    @endphp
                    <div class="flex-1">
                        <span class="text-gray-800">
                            <h1 class="text-xl">發布者：{{$member->name}}</h1>
                        </span>
                        <small class="ml-2 text-sm text-gray-600 mr-4">{{ $article->created_at->format('j M Y, g:i a')
                            }}</small>
                    </div>
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('Article.edit', ['articleName' => $article->Name])">
                                {{ __('編輯文章') }}
                            </x-dropdown-link>
                            <form id="DELECT" method="POST" action="{{ route('Article.destroy') }}" class="hidden">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="ArticleID" value="{{ $ArticleID }}">
                                <input type="hidden" name="ArticleName" value="{{ $ArticleName }}">
                                <button type="submit">刪除文章</button>
                            </form>
                            <x-dropdown-link :href="route('Article.destroy')"
                                onclick="event.preventDefault(); document.getElementById('DELECT').submit();"
                                :active="request()->routeIs('Article.destroy')">
                                {{ __('刪除文章') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>           
                <div class="ml-4">
                    <p class="ml-4 mb-4 mr-4">{!! nl2br(e($article->Content)) !!}</p>
                </div>
            </div>
        </div>
    </div>


    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @php
                    $articleID = $article->id;
                    $Comment = \App\Models\Comments::where('article_id','=',$articleID)->get();
                    @endphp
                    @if($Comment->count() > 0)
                    @foreach ($Comment as $comment)
                    @php
                    $Member = \App\Models\Member::find($comment->members_id);
                    @endphp
                    <p><b>{{ $Member->name }}</b></p>
                    <div class="flex">
                        <p class="ml-4 flex-1">{{ $comment->Content }}</p>
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <form id="EDLETECOMMENT" method="POST" action="{{ route('Comment.destroy') }}"
                                    class="hidden">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="CommentID" value="{{ $comment->id }}">
                                </form>
                                <x-dropdown-link :href="route('Comment.destroy')"
                                    onclick="event.preventDefault(); document.getElementById('EDLETECOMMENT').submit();"
                                    :active="request()->routeIs('Comment.destroy')">
                                    {{ __('刪除留言') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <br>
                    @endforeach
                    @else
                    <p>目前無留言</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>