<button type="button" onclick="window.location='{{ route('tree') }}'">to tree</button>
<table style="width: 200px">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Parent | ID</th>
    </tr>
    @foreach($catalogs as $catalog)
        <tr>
            <td>{{ $catalog->id }}</td>
            <td>{{ $catalog->title }}</td>
            <td>{{ $catalog->title($catalog->parent_id) }}
                @if(isset($catalog->parent_id))
                    | ({{ $catalog->parent_id }})
                @endif
            </td>
        </tr>
    @endforeach
</table>
