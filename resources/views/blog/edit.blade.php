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
                    <form action="{{ route('post.update', $post->id) }}" method="POST">
                        @csrf
                    	@method('PUT')
                        <x-text-input class="w-full" placeholder="Title" name="title" value="{{ $post->title }}" />
                        @error('title')
                        <p class='text-sm text-red-600 space-y-1'>{{ $message }}</p>
                        @enderror
                        <select name="category" id="categories" class="border border-gray-300 text-gray-800  rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 mt-4 shadow-sm">
                            <option selected disabled>Categories</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $post->category->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <p class='text-sm text-red-600 space-y-1'>{{ $message }}</p>
                        @enderror
                          <div class="form-group mt-4 mb-4">
                            <x-input-label>Tags</x-input-label>
                            <div class="form-check form-check-inline flex flex-wrap space-x-2  space-y-2 items-center justify-center">
					         @foreach($tags as $tag) <!-- Assuming you have a list of all tags -->
					            <input type="checkbox" 
					                   class="form-control form-check-input" 
					                   name="tags[]" 
					                   id="tag-{{ $tag->id }}"
					                   value="{{ $tag->id }}" >
					                   {{-- {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'checked' : '' }}> --}}
					            <label for="tag-{{ $tag->id}}" class="form-check-label">{{ $tag->name }}</label>
					        @endforeach
					        @error('tags')
                        		<p class='text-sm text-red-600 space-y-1'>{{ $message }}</p>
					        @enderror
                            </div>
                        </div>
                        @error('tags')
                        <p class='text-sm text-red-600 space-y-1'>{{ $message }}</p>
                        @enderror
                        <x-input-label>Content</x-input-label>
                        <textarea name="content" id="myeditorinstance">{!! $post->content !!}</textarea>
                        @error('content')
                        <p class='text-sm text-red-600 space-y-1'>{{ $message }}</p>
                        @enderror
                        <x-primary-button type="submit" class="mt-4 ">Publish</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
