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
                    <h1 class="text-xl">討論區列表</h1>
                    <br />
                    @foreach (\App\Models\Forum::paginate(10) as $forum)
                    <div class="mt-4 mb-4 flex">
                        <a class="flex-1" href="{{ url('Forum/' . $forum->forum_name) }}">{{ $forum->forum_name }}</a>
                        @php 
                            $forumID = $forum->id;
                        @endphp
                        <x-dropdown class="flex-1">
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
                                <form id="DELETE_{{ $forumID }}" method="POST" action="{{ route('Forum.destroy') }}" class="hidden">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="ForumID" value="{{ $forumID }}">
                                    <input type="hidden" name="ForumName" value="{{ $forum->forum_name }}">
                                </form>
                                <x-dropdown-link :href="route('Forum.destroy')"
                                    onclick="event.preventDefault(); document.getElementById('DELETE_{{ $forumID }}').submit();"
                                    :active="request()->routeIs('Forum.destroy')">
                                    {{ __('刪除討論區') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    @endforeach
                    {{ \App\Models\Forum::paginate(10)->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>