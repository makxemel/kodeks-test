<button type="button" onclick="window.location='{{ route('table') }}'">to table</button>
@if(count((array)$catalogs))
    @foreach ($catalogs as $i => $catalog)
        <div>
            {{$i+1}}. {{ $catalog->title }}

            @include('child-catalog-list', ['catalogs' => $catalog->children, 'root' => $i+1])
        </div>
    @endforeach
@endif
