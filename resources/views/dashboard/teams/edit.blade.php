<x-app-layout>
    <script src="https://cdn.tiny.cloud/1/yt4c5s5px656mcfoeugpsdwuzv0ptqo62r4o394melqwn44x/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
  tinymce.init({ selector:'textarea',
  plugins:'image link autolink code advlist imagetools spellchecker media', automatic_uploads: true, menubar: true,
  });
  </script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit ') . $team->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl h-full mx-auto sm:px-6 lg:px-8">
          @include('errors')

          {{ Form::model($team, array('route' => array('teams.update', $team->id), 'files' => true, 'method' => 'PUT')) }}﻿
              @csrf

              <div>
                  <x-jet-label value="{{ __('Name') }}" />
                  <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="$team->name" required autofocus />
              </div>

              <div class="mt-4">
                  <x-jet-label value="{{ __('Active') }}" />
                  @if ($team->active)
                    <select class="form-input rounded-md shadow-sm block mt-1 w-full" name="active" required>
                      <option selected value="1">Active</option>
                      <option value="0">Not Active</option>
                    </select>
                  @else
                    <select class="form-input rounded-md shadow-sm block mt-1 w-full" name="active" required>
                      <option value="1">Active</option>
                      <option selected value="0">Not Active</option>
                    </select>
                  @endif
              </div>

              <div class="flex items-center justify-end mt-4">

                  <x-jet-button class="ml-4">
                      {{ __('Update') }}
                  </x-jet-button>
              </div>
          {{ Form::close() }}
          <div class="flex items-center justify-end mt-4">
          {!! Form::model($team, array('route' => array('teams.destroy', $team->id), 'method' => 'DELETE')) !!}﻿
              <x-jet-button class="ml-4 bg-red-500">
                  {{ __('Delete') }}
              </x-jet-button>
          {!! Form::close() !!}
          </div>
        </div>
    </div>
</x-app-layout>
