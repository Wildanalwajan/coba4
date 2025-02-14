<h1>this is admin</h1>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline">
    @csrf
    <button type="submit" class="flex items-center text-gray-500 hover:text-red-600">
        <span class="mr-2">Keluar</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" stroke="currentColor" fill="none">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 002 2h3m-5-6V9a2 2 0 00-2-2H7m-2 0a2 2 0 00-2 2v10a2 2 0 002 2h3a2 2 0 002-2v-1"/>
        </svg>
    </button>
</form>
