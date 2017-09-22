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
              <form action="/lessons_group/{{ $lessons_group->id }}" method="post" enctype="multipart/form-data">
               <div class="panel-heading clearfix" style="background-color:#f5f5f5;border-bottom:1px solid #ddd;">
                   <a href="{{ route('lessons_group.show', [ 'id' => $lessons_group->id ]) }}" class="btn btn-primary pull-left" >Відмінити</a>
                    <input type="submit" class="btn btn-success pull-right" value="Зберегти">
               </div>
                <div class="panel-body">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="user_id" value="{{ $lessons_group->user_id }}">
                    <input type="hidden" name="author" value="{{ $lessons_group->author }}">
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $lessons_group->title }}">
                        </div>
                        <div class="form-group col-md-4 pull-right">
                            <label for="lesson_category_id">Category</label>
                            <select name="lesson_category_id" class="form-control">
                                @forelse($categories as $category)
                                  <option value="{{ $category->id }}" {{ $category->id == $lessons_group->lesson_category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @empty
                                  <option value="0">Категорії відсутні</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" value="{{ $lessons_group->description }}">
                        </div>
                    </div>
                    <div class="row text-center">
                        @if (Storage::disk('local')->has('courses/'.$lessons_group->image))
                            <img id="blah" class="img-fluid d-block mx-auto center-block" src="{{ route('lessons_group.image', ['filename' => $lessons_group->image ]) }}" alt="{{ $lessons_group->title }}" style="margin-bottom:15px;">
                            @endif
                            <div class="form-group col-md-4 col-md-offset-4">
                                <label for="image">Image (required 400x300px)</label>
                                <input onchange="readURL(this);" type="file" name="image" class="form-control" value="{{ $lessons_group->image }}">
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="text">Content</label>
                        <textarea name="text" rows="25" class="form-control my-editor">{!! $lessons_group->text !!}
                        </textarea>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    
<script type="application/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(400)
                .height(300);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection