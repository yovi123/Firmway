@include('layout.header')

<div class="container">

    @if ($message = Session::get('validation_error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row">
        <form method="POST" action="{{url('/update/'.$data->id)}}" enctype="multipart/form-data">
            <fieldset>
                <legend>Add product</legend>
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label mt-4">Title</label>
                    <input type="text" class="form-control" id="" name="title" placeholder="Title"
                        value="{{$data->title}}">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea" class="form-label mt-4">Description</label>
                    <textarea class="form-control" id="" name="description" rows="3">{{$data->title}}</textarea>
                </div>
                <div class="form-group">
                    <label for="formFile" class="form-label mt-4">Blog Image</label>
                    <img src="{{asset('images/'.$data->image_path)}}" width="50" height="50" alt="">
                    <input class="form-control" type="file" name="image" id="formFile">
                    <input class="form-control" type="hidden" name="image_name" id="formFile"
                        value="{{$data->image_path}}">
                </div>
                <button type="submit" class="btn btn-primary">submit</button>
            </fieldset>
        </form>
    </div>
</div>
@include('layout.footer')