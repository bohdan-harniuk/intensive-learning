@extends('layouts.app')

@section('content')

@include('study.authors-panel') 
  
<div class="row">
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
       <div class="panel-heading">
           Створити урок до курсу <b>"{{ $course->title }}"</b>
       </div>
       <form action="/lessons" method="post" enctype="multipart/form-data">
           <div class="panel-body"> 
                 {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="author" value="{{ Auth::user()->username }}">
                <input type="hidden" name="lesson_group_id" value="{{ $course->id }}">
                <div class="row">
                   <div class="col-md-4" id="portfolio">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="portfolio-item">
                            <div class="portfolio-link">
                                <div class="portfolio-hover" style="cursor: auto;">
                                    <div class="portfolio-hover-content">
                                        <i class="">{{$course->title}}</i>
                                    </div>
                                </div>
                                <img class="img-fluid" src="{{ route('lessons_group.image', ['filename' => $course->image ]) }}" alt="{{ $course->title }}">
                            </div>
                        </div>
                   </div>
                    <div class="form-group col-md-8">
                        <label for="description">Description</label>
                        <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="panel-footer clearfix">
                <div class="form-group col-md-12 text-center">
                    <input type="submit" class="btn btn-success" value="Далі" style="padding: 9px 40px;">
                </div>
            </div>
         </form>
    </div>
</div>
</div>
@endsection