@include('layout.header')
<div class="container">
    <div class="row">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Sr no</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                    <tr class="table-active">
                        <th scope="row">{{$key+1}}</th>
                        <td><a href="{{url('details/'.$item->slug)}}">{{$item->title}}</td>
                        <td>
                            <a href="{{url('/edit/'.$item->id)}}" target="_blank" rel="noopener noreferrer"><button
                                    type="button" class="btn btn-primary">Edit</button></a>
                            <a href="{{url('/delete/'.$item->id)}}" target="_blank" rel="noopener noreferrer"><button
                                    type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $data->links() !!}
        </div>
    </div>
</div>
@include('layout.footer')