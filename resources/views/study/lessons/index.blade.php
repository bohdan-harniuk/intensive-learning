@extends('layouts.app')

@section('content')
    <div class="row">
       @forelse($lessons as $lesson)
           <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
               <div class="panel-heading">
                   <span>Present and past</span>
                   <span class="pull-right">
                       {{ $lesson->created_at->diffForHumans() }}
                   </span>
               </div>
                <div class="panel-body">
                  {{ $lesson->shortContent }}...
                  <a href="/lessons/{{ $lesson->id }}">Read more</a>
                </div>
                <div class="panel-footer clearfix" style="background-color:white;">
                    <i class="fa fa-heart pull-right"></i>
                </div>
            </div>
            </div>
       @empty
           No lessons.
       @endforelse
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            {{ $lesson->links() }}
        </div>
    </div>
@endsection