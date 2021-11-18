@include('layout.header')

<div class="container">
    
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <h3 class="card-header">{{$data->title}}</h3>
                <div class="card-body">
                </div>
                <img src="{{ asset('images/'.$data->image_path)}}" alt="">
                <div class="card-body">
                    <p class="card-text">{{$data->description}}</p>
                </div>
                <div class="card-footer text-muted">
                    {{$data->created_at}} - {{$data->published = 1?'Published':'Unpublished'}}
                </div>
            </div>
        </div>
    </div>
</div>
@include('layout.footer')