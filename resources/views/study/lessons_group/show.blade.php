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