@foreach($subcategories as $subcategory) 
        <option value="{{$subcategory->id}}" {{($parentCategory !== NULL && ($parentCategory->id === $subcategory->id)) ? 'selected' : ''}}> {{ '|--'.$subcategory->name}} </option>
	    @if(count($subcategory->subcategory))
            @include('backend.categories.includes.subCategory',[ 'subcategories' => $subcategory->subcategory])
        @endif
@endforeach