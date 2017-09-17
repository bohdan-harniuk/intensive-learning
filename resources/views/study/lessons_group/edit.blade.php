@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
               <div class="panel-heading">
                   Edit article
               </div>
                <div class="panel-body">
                  <form action="/lessons_groups/{{ $lessons_group->id }}" method="post">
                     {{ csrf_field() }}
                     {{ method_field('PUT') }}
                     <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                     <div class="form-group">
                         <label for="title">Title</label>
                         <input type="text" name='title' value="{{ $lessons_group->title }}">
                     </div>
                      <div class="form-group">
                       <label for="content">Text</label>
                       <textarea name="content" id="" cols="30" rows="3" class="form-control">{{ $lessons_group->text }}
                       </textarea>
                       </div>
                        <input type="submit" class="btn btn-success pull-right">
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection