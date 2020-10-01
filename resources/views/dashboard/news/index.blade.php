<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <a href="/dashboard/news/create" class="mb-6 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            Create new
          </a>
          <div class="grid grid-cols-3 gap-4">
            @foreach ($news->reverse() as $article)
              <div class="shadow overflow-hidden sm:rounded-md">
                <img src={{ asset('/images/' . $article->image) }} />
                <div class="px-4 py-5 bg-white sm:p-6">
                  <h6 class="text-sm">{{ date('d M Y', strtotime($article->created_at)) }}</h6>
                  <h3 class="text-xl font-bold mb-4">{{ $article->title }}</h3>
                  <a href={{ "/dashboard/news/edit/" . $article->id }} class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Edit
                  </a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
    </div>
</x-app-layout>
