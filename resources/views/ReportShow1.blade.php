@include('layouts.navigation')
@php
use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use App\Models\blacklisted;

@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            檢舉清單
        </h2>
    </x-slot>    
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-xl">所有檢舉</h1>
                    <br>
                    <div class="flex">
                        <p class="flex-1">單號</p>
                        <p class="flex-1">檢舉者</p>
                        <p class="flex-1">被檢舉者</p>
                        <p class="flex-1">原因</p>
                        <p class="flex-1">操作</p>
                    </div>
                    @forelse (Report::all() as $report)
                        <div class="flex mt-4">
                            <p class="flex-1">{{$report->id}}</p>
                            <p class="flex-1">{{$report->Com_id}}</p>
                            <p class="flex-1">{{$report->Acc_id}}</p>
                            <p class="flex-1">{{$report->Reason}}</p>
                            <div class="flex-1"></div>
                        </div>
                    @empty
                        <p>目前沒有檢舉資料。</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>    
</x-app-layout>
<?/*
@if(blacklisted::Where('members_id','=','$report->Acc_id')->get())
                            <form method="POST">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="AccID" value="{{ $report->Acc_id }}">
                                <x-primary-button>解除封鎖</x-primary-button>
                            </form>
                            @else
                            <form method="POST" action="{{route('UserBlock.block')}}">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="AccID" value="{{ $report->Acc_id }}">
                                <x-primary-button>封鎖</x-primary-button>
                            </form>
                            @endif
*/?>