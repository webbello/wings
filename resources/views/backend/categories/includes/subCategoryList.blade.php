@foreach($subcategories as $subcategory)
        <!-- <ul> -->
            <li class="list-group-item d-flex justify-content-between align-items-center">|---{{$subcategory->name}}
                <span class="badge ">
                    @include('backend.categories.includes.actions', ['category' => $subcategory])
                </span>
            </li> 
	    @if(count($subcategory->subcategory))
            @include('backend.categories.includes.subCategoryList',['subcategories' => $subcategory->subcategory])
        @endif
        <!-- </ul> -->
@endforeach