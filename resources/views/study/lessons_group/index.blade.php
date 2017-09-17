@extends('layouts.app')

@section('content')
    <div class="row">
       @forelse($lessons_groups as $lessons_group)
           <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
               <div class="panel-heading">
                   <span>Present and past</span>
                   <span class="pull-right">
                       {{ $lessons_group->created_at->diffForHumans() }}
                   </span>
               </div>
                <div class="panel-body">
                  {{ $lessons_group->description }}
                  <a href="/lessons_group/{{ $lessons_group->id }}">Read more</a>
                </div>
                <div class="panel-footer clearfix" style="background-color:white;">
                    <i class="fa fa-heart pull-right"></i>
                </div>
            </div>
            </div>
       @empty
           No lessons group.
       @endforelse
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            {{ $lessons_groups->links() }}
        </div>
    </div>
@endsection