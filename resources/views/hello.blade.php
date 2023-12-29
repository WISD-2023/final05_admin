@include('layouts.navigationgeneral') <!-- 引入導引列 -->

<!-- 引入各種模型 -->
@php
    use App\Models\Report;
    use App\Models\blacklisted;
    use App\Models\Member;

@endphp

<!-- 判斷是否有回傳訊息已顯示提醒視窗 -->
@if(session('success'))  
    <script>
        alert("{{ session('successMessage') }}");
    </script>
@endif  

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
                        @php
                            $acc_user = Member::find($report->Acc_id);
                            $com_user = Member::find($report->Com_id);
                        @endphp
                        <div class="flex mt-4">
                            <p class="flex-1">{{$report->id}}</p>
                            <p class="flex-1">{{$com_user->name}}</p>
                            <p class="flex-1">{{$acc_user->name}}</p>
                            <p class="flex-1">{{$report->Reason}}</p>
                            <!-- 根據已處理欄位來顯示封鎖還是已結案 -->
                            <div class="flex-1">
                                @if($report->is_handle)
                                    <p>已結案</p>                                
                                @else
                                    <form method="POST" action="{{route('UserBlock.block')}}">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" name="AccID" value="{{ $acc_user->id }}">
                                        <x-primary-button>封鎖</x-primary-button>
                                    </form>
                                @endif
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