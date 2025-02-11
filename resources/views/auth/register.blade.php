<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <!-- Customized Bootstrap Stylesheet -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <script type="module" src="{{asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js')}}"></script>
<script nomodule src="{{asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js')}}"></script>
<link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css')}}">
<link rel='stylesheet' href='{{asset('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap')}}'><link rel="stylesheet" href="{{asset('./css/styles.css')}}">

<link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css')}}" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="{{asset('css/styles.css')}}" rel="stylesheet">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="screen-1">
    <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Course System</h2>
    <br>
    <form action="{{ route('register') }}" method="POST" class="justify-content-center">
        @csrf
        <div class="email">
            <label for="name" class="text-primary">{{ __('Name') }}</label>
            <div class="sec-2">
              <ion-icon class="text-primary"></ion-icon>
              <input type="text" name="name" placeholder="Your Name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus/>
              @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
          </div>
          <br> <br> <br>
          <div class="email">
            <label for="email" class="text-primary">{{ __('Email Address') }}</label>
            <div class="sec-2">
              <ion-icon name="mail-outline" class="text-primary"></ion-icon>
              <input type="email" name="email" placeholder="Username@gmail.com" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>
              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
          </div>
          <br>
          <div class="password">
            <label for="password" class="text-primary">{{ __('Password') }}</label>
            <div class="sec-2">
              <ion-icon name="lock-closed-outline" class="text-primary"></ion-icon>
              <input class="pas" type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="············" required autocomplete="password" />
              <ion-icon class="show-hide text-primary" name="eye-outline"></ion-icon>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
          </div>
          <br>
          <div class="password">
            <label for="password" class="text-primary">{{ __('Confirm Password') }}</label>
            <div class="sec-2">
              <ion-icon name="lock-closed-outline" class="text-primary"></ion-icon>
              <input class="pas @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" placeholder="············"/>
              <ion-icon class="show-hide text-primary" name="eye-outline"></ion-icon>
            </div>
          </div>
          <br>
          <div class="d-flex justify-content-center">
                <button class="login bg-primary w-100" type="submit">{{ __('Register') }}</button>
          </div>
    </form>

  <div class="footer"><a href="{{url('login')}}"><span>Log in</span></a></div>
</div>
<!-- partial -->

</body>
</html>
