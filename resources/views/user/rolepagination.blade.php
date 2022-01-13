
<table class="table table-striped" id="table_data">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>description</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @php 
            echo sampleDefaultHelper();
        @endphp
        @if(count($data) != 0 )
            @php $c= 1; @endphp
            @foreach($data as $res)
            <tr>
                <td>{{ $c++ }}</td>
                <td>{{ $res['role_name'] }}</td> 
                <td>{{ $res['description'] }}</td>
                <td>{{ __('action') }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" align="center">
                    {!! $data->links() !!}
                </td>
            </tr>
        @else
        <tr>
            <td></td>
            <td></td>
            <td>No data</td>
            <td></td>
        </tr>
        @endif
    </tbody>

</table>
