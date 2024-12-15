<x-app-layout>
	   <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laravel Blog') }}
        </h2>
    </x-slot>
	<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                	<h2 class="text-xl">{{ $post->title }}</h2>
                	<p class="text-gray-500">By {{ $post->user->name  }}</p>
                	<hr class="my-6 h-0.5 border-t-0 bg-neutral-100" />
                	<p>
                		{!! $post->content !!}
                	</p>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>