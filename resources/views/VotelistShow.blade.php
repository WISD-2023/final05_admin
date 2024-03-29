@include('layouts.navigation') <!-- 顯示導覽列 -->
<!-- 導入 -->
@php 
    use App\Models\Vote;
    use App\Models\voting_record;
    use Illuminate\Support\Facades\Auth;
@endphp
<x-app-layout> <!-- 顯示頁面主題 -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投票清單
        </h2>
    </x-slot>

    <!-- 顯示所有投票 -->
    @foreach (Vote::all() as $vote)
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class = "text-xl">{{$vote->Title}}</h1>
                    <br>
                    <div class = "flex">
                        <p class = "flex-1">{{$vote->Content}}</p>
                        <div class = "flex-1"><p class = "ml-4">{{$vote->Total_vote}}</p></div>
                        <p class = "flex-1">{{$vote->Result}}</p>
                        @php
                          $voteid = $vote->id;
                          $voteRecords = voting_record::Where('vote_id','=',$voteid)->first();                          
                        @endphp
                        
                        @if($vote->Result == '已通過')
                            <x-primary-button>通過</x-primary-button>
                        @else
                            <form method="POST" action="{{route('Vote.update')}}">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="VoteID" value="{{ $vote->id }}">
                                <x-primary-button>批准</x-primary-button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>         
    @endforeach   
</x-app-layout>