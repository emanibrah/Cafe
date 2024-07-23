@extends('layouts.app')

@section('content')

 <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div>
          <section class="login_content">
          </section>
        </div>

        <div id="register">
          <section class="login_content">
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Fullname" required="" id="fullName" name="name" value="{{ old('name') }}" />
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div>
                <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" required="" id="userName" name="username" value="{{ old('username') }}" />
                @error('username')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div>
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required="" id="email" name="email" value="{{ old('email') }}" />
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div>
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required="" id="password" name="password" required autocomplete="new-password"/>
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div>
                <button type="submit"> {{ __('Register') }} </button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="{{ route('login') }}" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-graduation-cap"></i> Beverages Admin</h1>
                  <p>©{{ date('Y') }} All Rights Reserved. Beverages Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
</body>




@endsection
