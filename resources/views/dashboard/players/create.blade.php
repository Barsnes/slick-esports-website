<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new team') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl h-full mx-auto sm:px-6 lg:px-8">
          @include('errors')

          <form method="POST" action="{{ route('players.store') }}" enctype="multipart/form-data">
              @csrf

            <div class="grid grid-cols-3 gap-4 p-5 rounded-md bg-gray-300">
                <div>
                  <x-jet-label value="{{ __('First Name') }}" />
                  <x-jet-input class="mt-1 w-full" type="text" name="firstName" :value="old('firstName')" required autofocus />
                </div>
                <div>
                  <x-jet-label value="{{ __('Player Name') }}" />
                  <x-jet-input class="mt-1 w-full" type="text" name="playerName" :value="old('playerName')" required />
                </div>
                <div>
                  <x-jet-label value="{{ __('Last Name') }}" />
                  <x-jet-input class="mt-1 w-full" type="text" name="lastName" :value="old('lastName')" required />
                </div>
              </div>

              <div class="mt-4">
                  <x-jet-label value="{{ __('Image (400x488)') }}" />
                  <x-jet-input class="block mt-1 w-full" type="file" name="image" />
              </div>

              <div class="mt-4">
                  <x-jet-label value="{{ __('Team') }}" />
                  <select class="form-input rounded-md shadow-sm block mt-1 w-full" name="team_id" required>
                    @foreach ($teams as $team)
                      @if ($team->active)
                        <option value={{ $team->id }}>{{ $team->name }}</option>
                      @endif
                    @endforeach
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
