@include('layouts.navigationgeneral')  <!-- 引入導引列 -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            創建討論區
        </h2>
    </x-slot>
    <div class="py-12"> <!-- 填寫區域 -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-4 text-xl">討論區創建表單</h1>
                    <form method="POST" action="{{route('Forum.store')}}">
                        @csrf
                        <textarea name="ForumName" placeholder="{{ __('輸入討論區名稱') }}"
                            class="h-24 block w-1/2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                        <br>
                        <x-input-error :messages="$errors->get('ForumName')" class="mt-2" />
                        <x-primary-button class="mt-4">{{ __('創建') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>