
@section('content')
      
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Email</th>
            <th>Asunto</th>
            <th>Mensaje</th>
            <th width="280px">Opción</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->subject }}</td>
            <td>{{ \Str::limit($value->message, 100) }}</td>
            <td>
                <form action="{{ route('contact.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('contact.show',$value->id) }}">Show</a>    
                    <!-- <a class="btn btn-primary" href="{{ route('posts.edit',$value->id) }}">Edit</a> -->   
                    @csrf
                    <!-- @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button> -->
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection