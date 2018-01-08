@extends('layouts.main')

@section('styles')
<link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="row no-margin">
    <div class="col s2 primary-color" style="height:100vh;">
        <div class="spacer"></div>
        <div class="row">
            <h3 class="col s12 logo-text white-text no-margin-top">{{ env('APP_DISPLAY_NAME') }}</h3>
            
            <div class="col s12 spacer"></div>
            <div class="col s12 no-padding nav-link-collection">
                <div class="row nav-link active">
                    <div class="col s2 icon"><i class="material-icons">home</i></div>
                    <div class="col s10 title">Home</div>
                </div>
                <div class="row nav-link">
                    <div class="col s2 icon"><i class="material-icons">folder</i></div>
                    <div class="col s10 title">Department</div>
                </div>
                <div class="row nav-link">
                    <div class="col s2 icon"><i class="material-icons">exit_to_app</i></div>
                    <div class="col s10 title">Logout</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
