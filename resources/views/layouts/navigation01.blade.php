<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 flex">
    <!-- Primary Navigation Menu -->
    <div class = "flex-1">
        <div class = "mx-auto mt-4">
            <a href = "{{url('Home')}}" class = "p-4">首頁</a>
        </div> 
    </div>
    <div class=" flex-1 max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex mx-auto mt-4">
                <h2 class = "text-xl">網路論壇</h1>                               
            </div>
        </div>
    </div>
    <div class=" flex-1">
        <div class = "flex justify-end">
            <a href = "{{url('register')}}" class = "p-4">註冊</a>
            <a href = "{{url('login')}}" class = "p-4">登入</a>
        </div>        
    </div>
</nav>
