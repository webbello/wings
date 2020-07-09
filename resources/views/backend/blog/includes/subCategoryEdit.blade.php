@foreach($subcategories as $subcategory)
        <option value="{{$subcategory->id}}" {{($subcategory->id == $post->category_id) ? 'selected' : ''}}>|--{{$subcategory->name}}</option>
	    @if(count($subcategory->subcategory))
            @include('backend.Blog.includes.subCategoryEdit',['subcategories' => $subcategory->subcategory])
        @endif
@endforeach