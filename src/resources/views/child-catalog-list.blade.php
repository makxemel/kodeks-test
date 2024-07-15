@if(count((array)$catalogs))
    @foreach($catalogs as $i => $catalog)

        <div style="margin-left: 20px">
            {{ $catalog->title }}

            @if(count((array)$catalog->children))
                @include('child-catalog-list',['catalogs' => $catalog->children, 'root' => $root + 1])
            @endif

        </div>

    @endforeach
@endif
