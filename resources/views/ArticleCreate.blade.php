@include('layouts.navigationgeneral')

@php
use App\Models\Forum;
$Forum = Forum::where('id','=',$fourmID)->first();
$ForumName = $Forum->forum_name;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$ForumName}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class = "mb-4 text-xl">發布文章</h1>
                    <form method="POST" action="{{route('Article.store')}}">
                        @csrf
                        <input type="hidden" name="fourID" value="{{ $fourmID }}">
                        <input type="hidden" name="fourname" value="{{ $ForumName }}">
                        <textarea name="title" placeholder="{{ __('輸入文章標題') }}"
                            class="h-24 block w-1/2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('message') }}</textarea>
                        <br>
                        <textarea name="comment" placeholder="{{ __('輸入文章內容') }}"
                            class="block w-full h-24 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('message') }}</textarea>
                        <br>
                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        <x-primary-button class="mt-4">{{ __('送出') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>