<x-app-layout>
    <script src="https://cdn.tiny.cloud/1/yt4c5s5px656mcfoeugpsdwuzv0ptqo62r4o394melqwn44x/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
  tinymce.init({ selector:'textarea',
  plugins:'image link autolink code advlist imagetools spellchecker media', automatic_uploads: true, menubar: true,
  });
  </script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit ') . $news->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl h-full mx-auto sm:px-6 lg:px-8">
          @include('errors')

          {{ Form::model($news, array('route' => array('news.update', $news->id), 'files' => true, 'method' => 'PUT')) }}﻿
              @csrf

              <div>
                  <x-jet-label value="{{ __('Title') }}" />
                  <x-jet-input class="block mt-1 w-full" type="text" name="title" :value="$news->title" required autofocus />
              </div>

              <div class="mt-4">
                  <x-jet-label value="{{ __('Author') }}" />
                  <x-jet-input class="block mt-1 w-full" type="text" name="author" :value="$news->author" required />
              </div>

              <div class="mt-4">
                  <x-jet-label value="{{ __('Image (1920x1080)') }}" />
                  <x-jet-input class="block mt-1 w-full" type="file" name="image" />
              </div>

              <div class="mt-4">
                  <x-jet-label value="{{ __('Current Image') }}" />
                  <img class="w-64" src={{ asset('/images/' . $news->image) }} />
              </div>

              <div class="mt-4">
                  <x-jet-label value="{{ __('Article') }}" />
                  <textarea class="block mt-1 h-full w-full p-5" type="text" name="body" style="min-height: 30rem" >
                    {!! $news->body !!}
                  </textarea>
              </div>

              <div class="flex items-center justify-end mt-4">

                  <x-jet-button class="ml-4">
                      {{ __('Update') }}
                  </x-jet-button>
              </div>
          {{ Form::close() }}
          <div class="flex items-center justify-end mt-4">
          {!! Form::model($news, array('route' => array('news.destroy', $news->id), 'files' => true, 'method' => 'DELETE')) !!}﻿
              <x-jet-button class="ml-4 bg-red-500">
                  {{ __('Delete') }}
              </x-jet-button>
          {!! Form::close() !!}
          </div>
        </div>
    </div>
</x-app-layout>
