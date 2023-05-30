<!doctype html>
<head>
    <meta charset="utf-8">

    <title>LARAVELCRUD</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet">

    <link href="starter-template.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
        body {
            padding-top: 5rem;
            background-color: burlywood;
        }
        .starter-template {
            padding: 3rem 1.5rem;
            text-align: center;
        }
        /* .table td{
            vertical-align: 50%;
        } */
        .form-inline {
            justify-content:space-between;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto" style="width: 100%; display: flex;justify-content: space-between;">
            <li class="nav-item active" >
                <a class="nav-link" href="{{ url('admin/tasks') }}">HOME </a>

            </li>
            
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('logout') }}">LOGOUT </a>
            </li>
        </ul>
        
        
    </div>
</nav>

<main role="main" class="container">

    <div class="starter-template">
        {{-- @if(session()->has('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div>
      @endif --}}
{{-- @if (session('success'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="text-center">
        <div class="alert alert-success" role="alert">
          {{session('success')}}
        </div>
    </div>

@endif --}}

    @yield("content")

    </div>

</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

