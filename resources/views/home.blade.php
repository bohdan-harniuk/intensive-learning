@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 user-details">
            <div class="user-image">
                <img src="img/pro-f.png" alt="Karan Singh Sisodia" title="Karan Singh Sisodia" class="img-circle">
            </div>
              @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
            <div class="user-info-block">
                <div class="user-heading">
                    <h3>{{ Auth::user()->name }} </h3>
                    <span class="help-block">Your age is {{ Auth::user()->age }}</span>
                </div>
                <div class="tab-pane">
                            <h4>You are logged in!</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
