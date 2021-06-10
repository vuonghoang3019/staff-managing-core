<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('home\css\register.css') }}">
</head>
<body>
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Welcome</h3>
            <p>You are 30 seconds away from earning your own money!</p>
            <input type="submit" name="" value="Login"/><br/>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Đăng ký</h3>
                   <form action="{{ route('postRegister') }}" method="post">
                       @csrf
                       <div class="row register-form">
                           <div class="col-md-12">
                               <div class="form-group">
                                   <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email *" value="{{ old('email') }}" />
                                   @error('email')
                                   <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                   @enderror
                               </div>
                               <div class="form-group">
                                   <input type="password" class="form-control @error('email') is-invalid @enderror" name="password" placeholder="Password" value="{{ old('password') }}" />
                                   @error('password')
                                   <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                   @enderror
                               </div>
                               <div class="form-group">
                                   <input type="text" class="form-control @error('email') is-invalid @enderror" name="name" placeholder="Hoàng Văn A" value="{{ old('name') }}"  />
                                   @error('name')
                                   <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                   @enderror
                               </div>
                               <div class="form-group">
                                   <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="032871456"  value="{{ old('phone') }}" />
                                   @error('phone')
                                   <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                   @enderror
                               </div>
                               <div class="form-group">
                                   <div class="maxl">
                                       <label class="radio inline">
                                           <input type="radio" name="sex" value="0" checked>
                                           <span> Male </span>
                                       </label>
                                       <label class="radio inline">
                                           <input type="radio" name="sex" value="1">
                                           <span>Female </span>
                                       </label>
                                   </div>
                                   @error('sex')
                                   <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                   @enderror
                               </div>
                               <button type="submit" class="btnRegister">Đăng ký</button>
                           </div>
                       </div>
                   </form>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
