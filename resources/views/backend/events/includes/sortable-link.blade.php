<a class="text-primary" href="{{ route('admin.events.index', ['search' => Request()->search, 'sort' => $sort, 'sortOrder' => $sortOrder]) }}"> {{$name}} 
    @if (Request()->sort == $sort AND $sortOrder == 'desc' )
        <i class="fas fa-sort-amount-up-alt"></i>
    @elseif(Request()->sort == $sort AND $sortOrder == 'asc' )
        <i class="fas fa-sort-amount-down-alt"></i>
    @else
        <i class="text-muted fas fa-sort"></i>
    @endif
</a>