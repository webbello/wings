@foreach($subcategories as $subcategory)
        <option value="{{$subcategory->id}}" {{($subcategory->parent_id === $category->id) ? 'selected' : ''}}>|--{{$subcategory->name}}</option>
	    @if(count($subcategory->subcategory))
            @include('backend.categories.includes.subCategory',['subcategories' => $subcategory->subcategory])
        @endif
@endforeach