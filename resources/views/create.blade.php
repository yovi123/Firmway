@include('layout.header')

<div class="container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    @if ($message = Session::get('validation_error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row">
        <form method="POST" action="{{url('/store')}}" enctype="multipart/form-data">
            <fieldset>
                <legend>Add product</legend>
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label mt-4">Title</label>
                    <input type="text" class="form-control" id="" name="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea" class="form-label mt-4">Description</label>
                    <textarea class="form-control" id="" name="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="formFile" class="form-label mt-4">Blog Image</label>
                    <input class="form-control" type="file" name="image" id="formFile">
                </div>
                <button type="submit" class="btn btn-primary">submit</button>
            </fieldset>
        </form>
    </div>
</div>
@include('layout.footer')