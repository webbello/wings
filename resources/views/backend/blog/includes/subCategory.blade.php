@foreach($subcategories as $subcategory)
        <option value="{{$subcategory->id}}">|--{{$subcategory->name}}</option>
	    @if(count($subcategory->subcategory))
            @include('backend.blog.includes.subCategory',['subcategories' => $subcategory->subcategory])
        @endif
@endforeach