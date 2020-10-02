<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new team') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl h-full mx-auto sm:px-6 lg:px-8">
          @include('errors')

          <form method="POST" action="{{ route('teams.store') }}" enctype="multipart/form-data">
              @csrf

              <div>
                  <x-jet-label value="{{ __('Name') }}" />
                  <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
              </div>

              <div class="mt-4">
                  <x-jet-label value="{{ __('Active') }}" />
                  <select class="form-input rounded-md shadow-sm block mt-1 w-full" name="active" required>
                    <option selected value="1">Active</option>
                    <option value="0">Not Active</option>
                  </select>
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
