@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
               <div class="panel-heading">
                   Create lessons group
               </div>
                <div class="panel-body">
                  <form action="/lessons_group" method="post">
                     {{ csrf_field() }}
                     <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                     <div class="form-group">
                           <label for="title">Title</label>
                           <input type="text" name="title" class="form-control">
                       </div>
                       <div class="form-group">
                           <label for="description">Description</label>
                           <textarea name="description" id="" cols="30" rows="3" class="form-control"></textarea>
                       </div>
                      <div class="form-group">
                       <label for="text">Content</label>
                       <textarea name="text" id="" cols="30" rows="5" class="form-control"></textarea>
                       </div>
                        <input type="submit" class="btn btn-success pull-right">
                  </form>
                </div>
            </div>
        </div>
    </div> 

@endsection