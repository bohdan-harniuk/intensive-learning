<style type="text/css">

</style>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default courses-panel">
            <div class="panel-heading">
               @if(Request::is('lessons_group'))
                <a href=" {{ route('lessons_group.create') }} " class="btn btn-success"><i class="fa fa-building-o"></i> Створити новий курс</a>
                @elseif(Request::is('lessons_group/create'))
                <a href=" {{ route('lessons_group.index') }} " class="btn btn-info"><i class="fa fa-arrow-left"></i> Відмінити</a>
                @elseif(Request::is('lessons_group/*'))
                <a href=" {{ route('lesson.create') }} " class="btn btn-success"><i class="fa fa-university"></i> Створити новий урок</a>
                @elseif(Request::is('lessons/create'))
                <a href=" {{ route('lessons_group.show', [ 'id' => $course->id ]) }} " class="btn btn-info"><i class="fa fa-arrow-left"></i> Відмінити</a>
                @elseif(Request::is('lessons/*'))
                <a href=" {{ URL::to('/lessons_group/'.$course->id.'#lessons') }} " class="btn btn-success"><i class="fa fa-arrow-left"></i> Повернутися</a>
                @endif
            </div>
        </div>
    </div>
</div>