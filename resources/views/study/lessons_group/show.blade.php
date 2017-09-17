@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
               <div class="panel-heading">
                   <span>Lesson group by Bohdan</span>
                   <span class="pull-right">{{ $lessons_group->created_at->diffForHumans() }}</span>
               </div>
                <div class="panel-body">
                <h1>{{ $lessons_group->title }}</h1>
                 {!! $lessons_group->text !!}
                </div>
            </div>
        </div>
    </div>
@endsection