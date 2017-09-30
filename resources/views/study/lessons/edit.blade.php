@extends('layouts.app')

@section('content')
<style type="text/css">
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
</style>
   
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <form action="/lessons/{{ $lesson->id }}" method="post" enctype="multipart/form-data">
           <div class="panel-heading clearfix" style="background-color:#f5f5f5;border-bottom:1px solid #ddd;">
               <a href="{{ route('lesson.show', [ 'id' => $lesson->id ]) }}" class="btn btn-primary pull-left" >Відмінити</a>
                <input type="submit" class="btn btn-success pull-right" value="Зберегти">
           </div>
            <div class="panel-body">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input type="hidden" name="user_id" value="{{ $lesson->user_id }}">
                <input type="hidden" name="author" value="{{ $lesson->author }}">
                <input type="hidden" name="lesson_group_id" value="{{ $lesson->lesson_group_id }}">
                <div class="row text-center">
                    <div class="form-group col-md-8 col-md-offset-2">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $lesson->title }}">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="form-group col-md-8 col-md-offset-2">
                        <label for="description">Description</label>
                        <textarea name="description" rows="5" class="form-control">{{ $lesson->description }}</textarea>
                    </div>
                </div>
           
            <div  id="items"></div>
            </div>
            <div class="panel-footer text-center">
                <a class="btn btn-success" id="add"><i class="fa fa-plus"></i> Додати тематичний блок до уроку</a>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
<div class="col-md-8 col-md-offset-2">
@forelse($l_blocks as $index => $l_block)
<div class="panel panel-default" data-name="{{$l_block->name}}">
<form action="/lesson_block/{{$l_block->id}}" method="post" enctype="multipart/form-data">
<div class="panel-heading clearfix text-center" style="background-color:#f5f5f5;border-bottom:1px solid #ddd;">
    <a class="btn btn-danger pull-left" data-toggle="modal" data-target="#deleteModal-{{ $l_block->id }}"><i class="fa fa-trash-o"></i></a>
    
    <input type="submit" name="put" class="btn btn-success pull-right" value="Зберегти">

    <button type="submit" name="put-up" class="btn btn-success" data-toggle="tooltip" title="Перемістити блок на рівень вище" {{ ($index == 0) ? 'disabled' : '' }}><i class="fa fa-arrow-up"></i></button>
    
    Content for <span class="text-info">{{ $l_block->name }}</span> block

    <button type="submit" name="put-down" class="btn btn-success" data-toggle="tooltip" title="Перемістити блок на рівень нижче" {{ ($index == count($l_blocks)-1) ? 'disabled' : '' }}><i class="fa fa-arrow-down"></i></button>

</div>
<div class="panel-body">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
    <div class="row text-center">
        <div class="form-group col-md-12">
            <textarea name="text" rows="5" class="form-control my-editor">{!! $l_block->text !!}</textarea>
        </div>
    </div>
</div>
</form>
</div>
@empty
<h4>В цьому уроці ще не створено жодного тематичного блоку</h4>
@endforelse
 </div>
</div>

<script src=" {{ URL::to('js/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::to('src/js/vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ URL::to('js/i-learning.js') }}"></script>

<script>
$(function() {
    
    tinymce.init(editor_config);
    
var counter = 0;
var _elementToFind = "my-editor"+counter;
var _elementFound = false;

$(document).bind("DOMSubtreeModified", function(evt) {
    if (_elementFound)
    return;
    if ($("#" + _elementToFind).length > 0) {
        tinymce.init(editor_config);
        _elementFound = true;
    }
});
    $("#add").click(function (e) {
        if($(this).attr('disabled')){
            return false;
        };
        $("#items").append('<div id="lesson-block"><form action="{{ route("l_block.store") }}" method="post">{{ csrf_field() }}<div class="form-group" id="aboji"><input type="hidden" name="lesson_id" value="{{ $lesson->id }}"><label for="text">Content</label><textarea name="text" rows="8" class="form-control my-editor" id="my-editor'+counter+'"></textarea></div><div class="col-md-12 alert alert-success" style="margin-top:0px; margin-bottom:0px;"><div class="text-center"><button type="submit" id="store" class="btn btn-success" style="margin-right:5px;"><i class="fa fa-floppy-o"></i> Зберегти</button><a class="btn btn-primary" id="remove"><i class="fa fa-undo"></i> Відмінити</a></div></div></form</div>');
        $("#remove").click(function() {
            $("#lesson-block").remove();   
            $("#add").removeAttr('disabled');
        });
        
        $("#my-editor"+counter).get(0).scrollIntoView();

        $("#add").attr('disabled','disabled');
        counter++;
        _elementFound = false;
        _elementToFind = "my-editor"+counter;

        return false;
    });
    
    
});
</script>

@forelse($l_blocks as $l_block)
<!-- Modal -->
<div id="deleteModal-{{$l_block->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-danger">Підтвердження видалення</h4>
      </div>
      <div class="modal-body text-center">
        <p>Ви дійсно хочете видалити тематичний блок?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Ні, відмінити</button>
        @if( $lesson->user_id == Auth::id() )
        <form action="{{ route('l_block.delete', [ 'id' =>  $l_block->id]) }}" method="post">
           {{ csrf_field() }}
           {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger pull-left"><i class="fa fa-trash-o"></i> Так, видалити</button>
        </form>
        @endif
      </div>
    </div>
  </div>
</div>
@empty
@endforelse

@endsection