<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teams') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <a href="/dashboard/teams/create" class="mb-6 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            Create new
          </a>
          <div class="grid grid-cols-3 gap-4">
            @foreach ($teams->reverse() as $team)
              <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                  @if($team->active)
                    <h6 class="text-sm text-green-500 text-bold">Active</h6>
                  @else
                    <h6 class="text-sm text-red-600">Not Active</h6>
                  @endif
                  <h3 class="text-xl font-bold mb-1">{{ $team->name }}</h3>
                  <div class="grid grid-cols-2 grid-gap-4">
                    <a href={{ "/dashboard/teams/" . $team->id . "/edit"}} class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                      Edit
                    </a>
                    @if (!$team->highlight)
                      {!! Form::model($team, array('route' => array('teams.highlight', $team->id), 'method' => 'PUT')) !!}﻿
                          <x-jet-button class="inline-flex bg-yellow-300">
                              {{ __('Highlight') }}
                          </x-jet-button>
                      {!! Form::close() !!}
                    @endif
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
    </div>
</x-app-layout>
