<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Slick Esports Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3 gap-4">
          <a href="/dashboard/about" class="shadow overflow-hidden sm:rounded-md bg-blue-800 h-32 flex items-center justify-center">
            <h3 class="text-4xl font-bold text-white">About</h3>
          </a>
          <a href="/dashboard/news" class="shadow overflow-hidden sm:rounded-md bg-blue-800 h-32 flex items-center justify-center">
            <h3 class="text-4xl font-bold text-white">News</h3>
          </a>
          <a href="/dashboard/teams" class="shadow overflow-hidden sm:rounded-md bg-blue-800 h-32 flex items-center justify-center">
            <h3 class="text-4xl font-bold text-white">Teams</h3>
          </a>
          <a href="/dashboard/players" class="shadow overflow-hidden sm:rounded-md bg-blue-800 h-32 flex items-center justify-center">
            <h3 class="text-4xl font-bold text-white">Players</h3>
          </a>
          <a href="/dashboard/sponsors" class="shadow overflow-hidden sm:rounded-md bg-blue-800 h-32 flex items-center justify-center">
            <h3 class="text-4xl font-bold text-white">Sponsors</h3>
          </a>
        </div>
    </div>
</x-app-layout>
