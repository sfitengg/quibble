@extends('layouts.main')

@section('title','| Login')

@section('styles')

      <link type="text/css" rel="stylesheet" href="{{ asset('css/index.css') }}"  media="screen,projection"/>

@endsection



@section('content')
      <div id="app">
          <div class="row no-margin-bottom">
              <div class="col s12 m6 offset-m3 full-height v-align">
                  <div class="row teal lighten-5" >
                    <div class="col s10 offset-s1 m8 offset-m2 no-padding center-align">
                        <h2 class="logo-text teal-text">quibble</h2>
                    </div>
                    <div class="col s10 offset-s1 m8 offset-m2 no-padding">
                      <form action="" method="get">
                            <div class="input-field col s12">
                                <input type="email"  name="username" id="username">
                                <label for="username">Username</label>
                            </div>
                            <div class="input-field col s12">
                                <input type="password" name="password" id="password">
                                <label for="password">Password</label>
                            </div>
                            <div class="col s12">
                                <button id="login" class="col s12 btn waves-effect waves-light" type="button">Signin</button>
                            </div>
                        </form>
                    </div>
                    <div class="col s10 offset-s1 m8 offset-m2 ">
                        <p>
                            <p class="center-align">
                              <a class="center-align tooltipped" data-position="right" id="forgot-password" data-delay="200" data-tooltip="Enter you username, and click forget password" href="#!">Forgot Password ?<br/></a>
                            </p>
                            <span class="grey-text text-darken-1">For new account, contact the administrator.</span>
                        </p>
                    </div>
                  </div>
              </div>
          </div>
      </div>
@endsection

@section('scripts')
     
      <script src="{{ asset('js/login.js') }}"></script>
      <script type="text/javascript">

     
          $("#login").click(function(){
              // alert("hello");
              attempt_login();
          });
          $("#forgot-password").click(function(){
              forgot_password();
          });
    
      </script>
@endsection