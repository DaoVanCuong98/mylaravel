<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><b>REGISTER</b></a>
  </div>

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      {{-- <p class="login-box-msg" style="color:black"> ĐĂNG KÝ</p> --}}
        @include('admin.alert')
      <form action="" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
            <input type="password" name="repassword" class="form-control" placeholder="RePassword">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4" >
            <button type="submit" class="btn btn-primary btn-block">Register</button>
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
</body>
</html>
