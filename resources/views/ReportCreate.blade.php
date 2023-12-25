@include('layouts.navigationgeneral')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            檢舉回報區
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class = "mb-4 text-xl">檢舉回報</h1>
                    <form method="POST" action="{{route('Report.store')}}">
                        @csrf
                        <textarea name="Acc_Name" placeholder="{{ __('輸入要檢舉的人的名字') }}"
                            class="h-24 block w-1/2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                        <br>
                        <textarea name="Reason" placeholder="{{ __('輸入理由') }}"
                            class="block w-full h-24 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                        <br>
                        <x-input-error :messages="$errors->get('Acc_ID')" class="mt-2" />
                        <x-input-error :messages="$errors->get('Reason')" class="mt-2" />
                        <x-primary-button class="mt-4">{{ __('送出') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>