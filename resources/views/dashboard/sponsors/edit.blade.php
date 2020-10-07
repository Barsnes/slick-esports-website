<x-app-layout>
  <script src="https://cdn.tiny.cloud/1/yt4c5s5px656mcfoeugpsdwuzv0ptqo62r4o394melqwn44x/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({ selector:'textarea',
    plugins:'image link autolink code advlist imagetools spellchecker media', automatic_uploads: true, menubar: true,
    });
  </script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit ') . $sponsor->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl h-full mx-auto sm:px-6 lg:px-8">
          @include('errors')

          {{ Form::model($sponsor, array('route' => array('sponsors.update', $sponsor->id), 'files' => true, 'method' => 'PUT')) }}﻿
              @csrf

                <div>
                  <x-jet-label value="{{ __('Name') }}" />
                  <x-jet-input class="mt-1 w-full" type="text" name="name" :value="$sponsor->name" required autofocus />
                </div>
                <div>
                  <x-jet-label value="{{ __('Url') }}" />
                  <x-jet-input class="mt-1 w-full" type="text" name="url" :value="$sponsor->url" required />
                </div>
                <div class="mt-4 grid grid-cols-2 gap-4">
                  <div>
                    <x-jet-label value="{{ __('Current Image') }}" />
                    <img class="h-64 pt-4 pb-4" src={{ asset('/images/' . $sponsor->image) }} />
                  </div>
                  <div>
                    <x-jet-label value="{{ __('Image') }}" />
                    <x-jet-input class="block mt-1 w-full" type="file" name="image" />
                  </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                  <x-jet-button class="ml-4">
                      {{ __('Update') }}
                  </x-jet-button>
                </div>
          {{ Form::close() }}
          <div class="flex items-center justify-end mt-4">
          {!! Form::model($sponsor, array('route' => array('players.destroy', $sponsor->id), 'files' => true, 'method' => 'DELETE')) !!}﻿
              <x-jet-button class="ml-4 bg-red-500">
                  {{ __('Delete') }}
              </x-jet-button>
          {!! Form::close() !!}
          </div>
        </div>
    </div>
</x-app-layout>
