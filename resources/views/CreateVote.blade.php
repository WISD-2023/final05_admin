@include('layouts.navigation')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            發起投票
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-4 text-xl">投票表單</h1>
                    <form method="POST" action="{{route('Vote.store')}}">
                        @csrf
                        <textarea name="votetitle" placeholder="{{ __('輸入投票標題') }}"
                            class="h-24 block w-1/2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                        <br>
                        <textarea name="content" placeholder="{{ __('輸入內容') }}"
                            class="block w-full h-24 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                        <br>
                        <x-input-error :messages="$errors->get('votetitle')" class="mt-2" />
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        <x-primary-button class="mt-4">{{ __('送出') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>