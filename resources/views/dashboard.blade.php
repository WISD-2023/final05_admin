@include('layouts.navigation')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('首頁') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- {{ __("You're logged in!") }} -->
                    @include('layouts.rule')
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class = "text-xl">討論區列表</h1>            
                    <br/>
                    @foreach (\App\Models\Forum::paginate(10) as $forum)
                        <div class="mt-4 mb-4">
                            <a href="{{ url('Forum/' . $forum->forum_name) }}">{{ $forum->forum_name }}</a>
                        </div>
                    @endforeach
                    {{ \App\Models\Forum::paginate(10)->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
