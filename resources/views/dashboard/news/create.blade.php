<x-app-layout>
    <script src="https://cdn.tiny.cloud/1/yt4c5s5px656mcfoeugpsdwuzv0ptqo62r4o394melqwn44x/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
  tinymce.init({ selector:'textarea',
  plugins:'image link autolink code advlist imagetools spellchecker media', automatic_uploads: true, menubar: true,
  });
  </script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl h-full mx-auto sm:px-6 lg:px-8">
          @include('errors')

          <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
              @csrf

              <div>
                  <x-jet-label value="{{ __('Title') }}" />
                  <x-jet-input class="block mt-1 w-full" type="text" name="title" :value="old('email')" required autofocus />
              </div>

              <div class="mt-4">
                  <x-jet-label value="{{ __('Author') }}" />
                  <x-jet-input class="block mt-1 w-full" type="text" name="author" required autocomplete={{ user.name }} />
              </div>

              <div class="mt-4">
                  <x-jet-label value="{{ __('Image (1920x1080)') }}" />
                  <x-jet-input class="block mt-1 w-full" type="file" name="image" required />
              </div>

              <div class="mt-4">
                  <x-jet-label value="{{ __('Article') }}" />
                  <textarea class="block mt-1 h-full w-full p-5" type="text" name="body" style="min-height: 30rem" ></textarea>
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
