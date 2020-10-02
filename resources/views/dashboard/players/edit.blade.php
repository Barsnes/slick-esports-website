<x-app-layout>
    <script src="https://cdn.tiny.cloud/1/yt4c5s5px656mcfoeugpsdwuzv0ptqo62r4o394melqwn44x/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
  tinymce.init({ selector:'textarea',
  plugins:'image link autolink code advlist imagetools spellchecker media', automatic_uploads: true, menubar: true,
  });
  </script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit ') . $player->playerName }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl h-full mx-auto sm:px-6 lg:px-8">
          @include('errors')

          {{ Form::model($player, array('route' => array('players.update', $player->id), 'files' => true, 'method' => 'PUT')) }}﻿
              @csrf

              <div class="grid grid-cols-3 gap-4 p-5 rounded-md bg-gray-300">
                  <div>
                    <x-jet-label value="{{ __('First Name') }}" />
                    <x-jet-input class="mt-1 w-full" type="text" name="firstName" :value="$player->firstName" required autofocus />
                  </div>
                  <div>
                    <x-jet-label value="{{ __('Player Name') }}" />
                    <x-jet-input class="mt-1 w-full" type="text" name="playerName" :value="$player->playerName" required />
                  </div>
                  <div>
                    <x-jet-label value="{{ __('Last Name') }}" />
                    <x-jet-input class="mt-1 w-full" type="text" name="lastName" :value="$player->lastName" required />
                  </div>
                </div>

                <div class="mt-4 grid grid-cols-2 gap-4">
                    <div>
                      <x-jet-label value="{{ __('Current Image') }}" />
                      @if($player->image === 'assets/jersey.png')
                       <img class="h-64 pt-4 pb-4" src='/assets/jersey.png' />
                      @else
                        <img class="h-64 pt-4 pb-4" src={{ asset('/images/' . $player->image) }} />
                      @endif
                    </div>
                    <div>
                      <x-jet-label value="{{ __('Image (400x488)') }}" />
                      <x-jet-input class="block mt-1 w-full" type="file" name="image" />
                    </div>
                </div>

                <div class="mt-4">
                    <x-jet-label value="{{ __('Team') }}" />
                    <select class="form-input rounded-md shadow-sm block mt-1 w-full" name="team_id" required>
                      <option selected value={{ $player->team->id }}>{{ $player->team->name }}</option>
                      @foreach ($teams as $team)
                        @if ($team->active && $team->id !== $player->team->id)
                          <option value={{ $team->id }}>{{ $team->name }}</option>
                        @endif
                      @endforeach
                    </select>
                </div>

                <div class="flex items-center justify-end mt-4">

                    <x-jet-button class="ml-4">
                        {{ __('Update') }}
                    </x-jet-button>
                </div>
          {{ Form::close() }}
          <div class="flex items-center justify-end mt-4">
          {!! Form::model($player, array('route' => array('players.destroy', $player->id), 'files' => true, 'method' => 'DELETE')) !!}﻿
              <x-jet-button class="ml-4 bg-red-500">
                  {{ __('Delete') }}
              </x-jet-button>
          {!! Form::close() !!}
          </div>
        </div>
    </div>
</x-app-layout>
