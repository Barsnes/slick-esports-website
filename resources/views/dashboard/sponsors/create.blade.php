<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new team') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl h-full mx-auto sm:px-6 lg:px-8">
          @include('errors')

          <form method="POST" action="{{ route('sponsors.store') }}" enctype="multipart/form-data">
              @csrf
              <div>
                <x-jet-label value="{{ __('Name') }}" />
                <x-jet-input class="mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
              </div>

              <div class="mt-4">
                <x-jet-label value="{{ __('Url') }}" />
                <x-jet-input class="mt-1 w-full" type="text" name="url" :value="old('url')" required autofocus />
              </div>

              <div class="mt-4">
                  <x-jet-label value="{{ __('Image') }}" />
                  <x-jet-input class="block mt-1 w-full" type="file" name="image" />
              </div>

              <div class="flex items-center justify-end mt-4">

                  <x-jet-button class="ml-4">
                      {{ __('Create') }}
                  </x-jet-button>
              </div>
          </form>
        </div>
    </div>
</x-app-layout>
