<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sponsors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <a href="/dashboard/sponsors/create" class="mb-6 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            Create new
          </a>
          <div class="grid grid-cols-3 gap-4">
            @foreach ($sponsors as $sponsor)
              <div class="shadow overflow-hidden sm:rounded-md bg-gray-500">
                <img style="max-width: 80%; max-height: 80%;" class="h-auto m-auto pt-4 pb-4 border-black" src={{ asset('/images/' . $sponsor->image) }} />
                <div class="px-4 py-5 bg-white sm:p-6">
                  <h3 class="text-xl font-bold">{{ $sponsor->name }}</h3>
                  <h6 class="text-sm font-bold mb-4">Url: <a class="text-blue-800" href={{ $sponsor->url }}>{{ $sponsor->url }}</a></h6>
                  <a href={{ "/dashboard/sponsors/" . $sponsor->id . "/edit"}} class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Edit
                  </a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
    </div>
</x-app-layout>
