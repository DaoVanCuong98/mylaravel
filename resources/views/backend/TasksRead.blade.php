<!--Load file Layout.blade.php vào đây-->
{{-- @extends('admin.main') --}}
@extends("backend.Layout")
@section("content")
<h1>TASKS</h1>
<form action="" method="GET" class="form-inline" >
  {{csrf_field()}}
<div class="form-group">
  <input class="form-control" name="key" placeholder="Search">
  <button type="submit" class="btn btn-primary"><i class="fas fa-search fa-fw"></i></button>
</div>
</form>
<hr>
<div class="row col-md-12 centered">

    <table class="table table-striped custab">
        <thead>
          @if (Auth::user()->level==1)
          <a href="{{ url('admin/tasks/create') }}" class="btn btn-primary btn-xs pull-right">CREATE TASK</a>
          @endif
        <tr>
            <th>STT</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Description</th>
            @if (Auth::user()->level==1)
            <th>Action</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach ($tasks as $index=>$rows)
        <tr>
            <td>{{ $index +1 }}</td>
            <td>
              <img src="{{ asset('upload/'.$rows->photo) }}" width= '150' height='100' class="img img-responsive" />
            </td>

            <td>{{ $rows->title }}</td>
            <td>{{ $rows->description }}</td>
            <td class='text-center'>
            {{-- <!-- dòng lệnh tắt: đặt tên cho đường dẫn là update <a class='btn btn-info btn-xs' href="{{route('update',['id'=>$rows->id])}} "><span class="glyphicon glyphicon-edit"></span> Edit</a> --> --}}
            @if (Auth::user()->level==1)
                <a class='btn btn-info btn-xs' href="{{ url('admin/tasks/update/'.$rows->id) }} "><span class="glyphicon glyphicon-edit"></span> Edit</a> 
                <a href="{{ url('admin/tasks/delete/'.$rows->id) }}" onclick="return window.confirm('Bạn có muốn xoá không?');" class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Delete</a>
                
                {{-- <a href="{{route('delete_task',$rows->id)}}"  data-toggle="modal" data-target="#exampleModal" class='btn btn-danger  btn-xs'> <span class='glyphicon glyphicon-remove'></span>Delete</a> --}}
                
                @endif
              </td>
        </tr>
       
        @endforeach
      </tbody>
    </table>
  
    <!-- Button trigger modal -->
<!-- Button trigger modal -->
<!-- Button trigger modal -->
  
  <!-- Modal -->
 
   {{-- <div class="modal fade" style="top:35%" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Bạn có muốn xoá không?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <a href="{{route('delete_task',$rows->id)}}"><button  type="button"  class="btn btn-primary">Xoá</button></a> 

        </div>
      </div>
    </div>
  </div>  --}}
  
   
</div>
  
@endsection




