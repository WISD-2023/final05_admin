@include('layouts.navigationgeneral')
@php
use App\Models\Report;
use App\Models\blacklisted;
use App\Models\Member;

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
                        <p class="flex-1">號碼</p>
                        <p class="flex-1">被封鎖者</p>
                        <p class="flex-1">操作</p>
                    </div>
                    @forelse (blacklisted::all() as $blacklisted)
                        @php
                            $block_user = Member::find($blacklisted->members_id);
                        @endphp
                        <div class="flex mt-4">
                            <p class="flex-1">{{$blacklisted->id}}</p>
                            <p class="flex-1">{{$block_user->name}}</p>
                            <div class="flex-1">
                                <form method="POST" action="{{route('Blacklisted.destroy')}}">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="BlackID" value="{{ $blacklisted->members_id }}">
                                    <x-primary-button>解封</x-primary-button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p>目前沒有檢舉資料。</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>    
</x-app-layout>