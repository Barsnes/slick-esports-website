<x-app-layout>
    <script src="https://cdn.tiny.cloud/1/yt4c5s5px656mcfoeugpsdwuzv0ptqo62r4o394melqwn44x/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
  tinymce.init({ selector:'textarea',
  plugins:'image link autolink code advlist imagetools spellchecker media', automatic_uploads: true, menubar: true,
  });
  </script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit About page')}}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl h-full mx-auto sm:px-6 lg:px-8">
          @include('errors')

          {{ Form::model($about, array('route' => array('about.update', 1), 'method' => 'PUT')) }}﻿
              @csrf

              <div>
                  <x-jet-label value="{{ __('About Page') }}" />
                  <textarea class="block h-full w-full p-5" type="text" name="body" style="min-height: 30rem" >
                      {!! $about->body !!}
                  </textarea>
              </div>

              <div>
                  <x-jet-label value="{{ __('Index Short Story') }}" />
                  <textarea class="block h-full w-full p-5" type="text" name="index_story" style="min-height: 30rem" >
                      {!! $about->index_story !!}
                  </textarea>
              </div>

              <div class="flex items-center justify-end mt-4">

                  <x-jet-button class="ml-4">
                      {{ __('Update') }}
                  </x-jet-button>
              </div>
          {{ Form::close() }}
        </div>
    </div>
</x-app-layout>
