@extends('layouts.main')

@section('title','| Login')

@section('styles')
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div id="app">
    <div class="row no-margin-bottom">
        <div class="col s12 m6 offset-m3 full-height v-align">
            <div class="row">
                <div class="col s10 offset-s1 m6 offset-m3 no-padding center-align">
                    <h2 class="logo-text primary-color-text">{{ env('APP_DISPLAY_NAME') }}</h2>
                </div>
                <div class="col s10 offset-s1 m6 offset-m3 no-padding">
                    <form action="" method="get">
                        <div class="input-field col s12">
                            <input type="text" name="username" id="username">
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
                <div class="col s10 offset-s1 m6 offset-m3 ">
                    <p>
                        <a href="javascript:void(0)">Forgot password?</a>&nbsp;&nbsp;<span class="grey-text text-darken-1">For new account, contact the administrator.</span>
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

        $(document).ready(function(){
          $("#login").click(function(){
              attempt_login();
          });
          $("#forgot-password").click(function(){
              forgot_password();
          });
        });
      </script>
@endsection