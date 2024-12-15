<form action="{{ route('post.store') }}" method="POST">
	@csrf
	<x-text-input class="w-full" placeholder="Title" name="title" value="{{ old('title')}}"/>
	@error('title')
        <p class='text-sm text-red-600 space-y-1' >{{ $message }}</p>
    @enderror
	<select value="{{ old('category') }}" name="category" id="categories" class="border border-gray-300 text-gray-800  rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 mt-4 shadow-sm">
		<option selected disabled>Categories</option>
		@foreach($categories as $category)
			<option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
		@endforeach

	</select>

	@error('category')
                <p class='text-sm text-red-600 space-y-1' >{{ $message }}</p>

    @enderror

	<div class="form-group mt-4 mb-4">
			<x-input-label>Tags</x-input-label>
		<div class="form-check form-check-inline tags">
		</div>
	</div>

	@error('tags')
               <p class='text-sm text-red-600 space-y-1' >{{ $message }}</p>

    @enderror

	<x-input-label>Content</x-input-label>
	<textarea value="{{ old('content') }}" name="content" id="myeditorinstance"></textarea>
	@error('content')
               <p class='text-sm text-red-600 space-y-1' >{{ $message }}</p>

    @enderror
	<x-primary-button type="submit" class="mt-4 ">Publish</x-primary-button>
</form>

@section('scripts')
<script>
	$(document).ready(function(){
		$("#categories").on('change', function() {	
			$.ajax({
				method: 'GET',
				url: `{{ route('category.get-single', ':id') }}`.replace(':id', $(this).val()),
				data: { _token: "{{ csrf_token() }}"},
				success: function(response) {
					$(".tags").html('');
					$(".tags").append(`
						${response.map((tag) => (
							`<input value=${tag.id} type='checkbox' class='form-control form-check-input' name='tags[]'>\
							<label class='form-check-label'>${tag.name}</label>`

							))}
						`);
				}
			})
		})
	})
	
</script>


@endsection