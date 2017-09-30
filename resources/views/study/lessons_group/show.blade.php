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
    .btn-primary {
        color: #fff;
        background-color: #337ab7;
        border-color: #2e6da4;
    }
    .btn-primary.active, .btn-primary:active, .show>.btn-primary.dropdown-toggle {
        color: #fff;
        background-color: #025aa5;
        background-image: none;
        border-color: #01549b;
    }
    .btn-primary:hover {
        color: #fff;
        background-color: #025aa5;
        border-color: #01549b;
    }
    .btn-primary.focus, .btn-primary:focus {
        -webkit-box-shadow: 0 0 0 2px rgba(2,117,216,.5);
        box-shadow: 0 0 0 2px rgba(2,117,216,.5);
    }
    .btn-primary.active.focus, .btn-primary.active:focus, .btn-primary.active:hover, .btn-primary:active.focus, .btn-primary:active:focus, .btn-primary:active:hover, .open>.btn-primary.dropdown-toggle.focus, .open>.btn-primary.dropdown-toggle:focus, .open>.btn-primary.dropdown-toggle:hover {
        color: #fff;
        border-color: #025aa5;
        background-color: #014c8c;
    }
    .btn-primary.focus, .btn-primary:focus {
    color: #fff;
    border-color: #46a1ef;
    background-color: #337ab7;
    }
    .well {
        background-color: rgb(239, 251, 253);
        margin-bottom: 0px;
    }
    #lesson-btn {
        padding: 13px 12px;
        font-size: 17px;
        margin-bottom: 12px;
    }
    .lesson {
        margin: 5px 0;
    }
</style>

@include('study.authors-panel')
   
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               <div class="panel-heading clearfix" style="background-color:#f5f5f5;border-bottom:1px solid #ddd;">
                 @if( $lessons_group->user_id == Auth::id() )
                     <a class="btn btn-danger pull-left" data-toggle="modal" data-target="#deleteModal" >
                    <i class="fa fa-trash-o"></i>
                    </a>
                   <a class="btn btn-info pull-right" href="{{ route('lessons_group.edit', [ 'id' =>  $lessons_group->id]) }}">
                    <i class="fa fa-edit"></i>
                    Edit</a>
                 @endif
               </div>
                <div class="panel-body">
                    <h1 class="text-center">{{ $lessons_group->title }}</h1><hr>
                    @if (Storage::disk('local')->has('courses/'.$lessons_group->image))
                    <img class="img-fluid d-block mx-auto center-block" src="{{ route('lessons_group.image', ['filename' => $lessons_group->image ]) }}" alt="{{ $lessons_group->title }}"><hr>
                    @endif
                     <p>{!! $lessons_group->text !!}</p>
                </div>
                <div class="panel-footer clearfix text-center">
                    <ul class="list" style="list-style:none">
                        <li class="text-success">Author: {{ $lessons_group->author }} <span class="text-success small"> (category: {{ $lessons_group->category }})</span><span class="text-primary small"> - {{ $lessons_group->created_at->format('F Y') }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body text-center" id="lessons">
                  <span><i class="fa fa-university fa-3x" style="color: #fed136;"></i> <p>Уроки</p></span><hr>
                   @forelse($lessons as $lesson)
                       <div class="lesson col-md-12">
                            <a href="#spoiler-{{$lesson->id}}" data-toggle="collapse" class="btn btn-primary collapsed col-md-12" id="lesson-btn">{{$lesson->title}}</a>
                            <div class="collapse" id="spoiler-{{$lesson->id}}">
                               <div class="panel panel-default">
                                  <div class="panel-body well">
                                  <p style="margin-top:10px;">{{$lesson->description}}</p>
                                  <a href=" {{ route('lesson.show', ['id' => $lesson->id]) }} " class="btn btn-success pull-right"><i class="fa fa-university"></i> Перейти до уроку</a>
                                  </div>
                                </div>
                            </div>
                        </div>
                   @empty
                   <h4>У цьому курсі поки немає доступних уроків</h4>
                   @endforelse
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
        <p>Ви дійсно хочете видалити курс?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Ні, відмінити</button>
        @if( $lessons_group->user_id == Auth::id() )
        <form action="{{ route('lessons_group.delete', [ 'id' =>  $lessons_group->id]) }}" method="post">
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