@extends('layouts.app')

@section('content')
<style type="text/css">
    .modal-header{
        background-color:#f5f5f5;
        border-bottom:1px solid #ddd;
    }
    .modal-footer{
        background-color:#f5f5f5;
        border-top:1px solid #ddd;
    }
</style>

@include('study.authors-panel')
   
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               <div class="panel-heading clearfix" style="background-color:#f5f5f5;border-bottom:1px solid #ddd;">
                 @if( $lesson->user_id == Auth::id() )
                     <a class="btn btn-danger pull-left" data-toggle="modal" data-target="#deleteModal" >
                    <i class="fa fa-trash-o"></i>
                    </a>
                   <a class="btn btn-info pull-right" href="{{ route('lesson.edit', ['id' =>  $lesson->id]) }}">
                    <i class="fa fa-edit"></i>
                    Edit</a>
                 @endif
               </div>
                <div class="panel-body">
                    <h1 class="text-center">{{ $lesson->title }}</h1><hr>
                     <!-- <p>{!! $lesson->text !!}</p> -->
                </div>
                <div class="panel-footer clearfix text-center">
                    <ul class="list" style="list-style:none">
                        <li class="text-success">Author: {{ $lesson->author }} (course: <span class="text-danger small">{{ $course->title }}</span> - <span class="text-info small">{{ $course->created_at->format('F Y') }})</span> <span class="text-success small">Lesson created - </span> <span class="text-info small">{{ $lesson->created_at->format('F Y') }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-danger">Підтвердження видалення</h4>
      </div>
      <div class="modal-body text-center">
        <p>Ви дійсно хочете видалити урок?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Ні, відмінити</button>
        @if( $lesson->user_id == Auth::id() )
        <form action="{{ route('lesson.delete', [ 'id' =>  $lesson->id]) }}" method="post">
           {{ csrf_field() }}
           {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger pull-left"><i class="fa fa-trash-o"></i> Так, видалити</button>
        </form>
        @endif
      </div>
    </div>

  </div>
</div>
@endsection