
<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><b>LOGIN</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      {{-- <p class="login-box-msg"> Đăng Nhập</p> --}}
        @include('admin.alert')
      <form action="login/store" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock" id="eyes" ></span> 
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          
          <!-- /.col -->
        </div>
        
      </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


@include('admin.footer')
 <!--Hiện mật khẩu-->
 <script>
  var stt = 0;
  $('#eyes').click(function (){
    stt++;
    if(stt%2!=0){
      $('#password').attr('type','text');
    }else{
      $('#password').attr('type','password');
    }
    
  })
</script> 

</body>
</html>
