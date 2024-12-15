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
                	<a href="{{ route('post.create') }}">
                		<x-primary-button>Create new blog</x-primary-button>
                	</a>
                	<div class="flex items-start flex-col ">
                	@foreach($posts as $post)
                	<a href="{{ route('post.show', $post->id) }}" class="hover:bg-yellow-50 w-full p-4 rounded cursor-pointer">
                		<h2 class="mb-3">{{ $post->title }}</h2>
                		{{-- <h2>{!! $post->content !!}</h2> --}}
                		<ul class="flex flex-row space-x-2">
	                		<span class="text-gray-500 text-sm">
	    						<i class="fa fa-calendar-alt"></i> {{ $post->formatted_date }}
							</span>
							<span class="text-gray-500 text-sm">
								<i class="fa fa-user"></i>
	                			{{ $post->user->name }}
							</span>
							<span class="text-gray-500 text-sm">
								<i class="fa fa-folder text-gray-500"></i> {{ $post->category->name }}
								
							</span>
							<span class="text-gray-500 text-sm">
								<ul class="flex flex-row items-center space-x-2">
								<i class="fa fa-tag text-gray-500"></i>
								@foreach($post->tags as $tags)
									<li>{{ $tags->name }}</li>
								@endforeach
								</ul>
							</span>
                		</ul>
                		</a>
                	@endforeach
					</div>


                </div>
            </div>
        </div>
    </div>


</x-app-layout>