@extends('layouts.app')

@section('content')
   
@include('study.authors-panel')
   
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               <div class="panel-heading">
                   Create course
               </div>
                <div class="panel-body">
                  <form action="/lessons_group" method="post" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                     <input type="hidden" name="author" value="{{ Auth::user()->username }}">
                     <div class="row">
                         <div class="form-group col-md-8">
                               <label for="title">Title</label>
                               <input type="text" name="title" class="form-control">
                         </div>
                         <div class="form-group col-md-4 pull-right">
                               <label for="lesson_category_id">Category</label>
                               <select name="lesson_category_id" class="form-control">
                                  @forelse($categories as $category)
                                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @empty
                                      <option value="0">Категорії відсутні</option>
                                  @endforelse
                               </select>
                         </div>
                     </div>
                     <div class="row">
                          <div class="form-group col-md-8">
                               <label for="description">Description</label>
                               <input type="text" name="description" class="form-control">
                          </div>
                          <div class="form-group col-md-4 pull-right">
                               <label for="image">Image (required)</label>
                               <input type="file" name="image" class="form-control">
                          </div>
                     </div>
                      <div class="form-group">
                       <label for="text">Content</label>
                       <textarea name="text" cols="30" rows="20" class="form-control my-editor"></textarea>
                       </div>
                       <div class="form-group text-center">
                           <input type="submit" class="btn btn-success">
                       </div>
                        
                  </form>
                </div>
            </div>
        </div>
    </div> 
    


@endsection