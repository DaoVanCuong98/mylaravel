<!--Load file Layout.blade.php vào đây-->
@extends("backend.Layout")
@section("content")
<h1>CREATE TASKS</h1>
<form method='post' action='#' enctype= "multipart/form-data">
    @if($errors->any())
    <div class="alert alert-danger text-center">
        Vui long nhap lai du lieu
    </div>    
    @endif
@csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter a title" name="title">
        @error('title')
        <span style="color:red">{{$message}}</span></br>
        @enderror    
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" placeholder="Enter a description" name="description">
        @error('description')
        <span style="color:red">{{$message}}</span></br>
        @enderror
    </div>
    {{-- <label for="description">Photo</label>
    <input class="form-control" name="photo" type="file" id="photo"></br> --}}
    <div class="form-group">
        <label class="col-md-3 col-sm-4 control-label">Ảnh </label>
        <div class="col-md-9 col-sm-8">
            <div class="row">
                <div class="col-xs-6">
                    <img id="mat_truoc_preview" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                         style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                    <input type="file" name="photo" accept="image/*"
                           class="form-control-file @error('photo') is-invalid @enderror" id="cmt_truoc">
                    
                </div>
            </div>
        </div>
    </div>
   
    <button type="submit" class="btn btn-primary">Create</button>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $(function(){
        function readURL(input, selector) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $(selector).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#cmt_truoc").change(function () {
            readURL(this, '#mat_truoc_preview');
        });

    });
</script>
@endsection