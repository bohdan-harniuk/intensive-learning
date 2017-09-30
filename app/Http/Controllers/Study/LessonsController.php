<?php

namespace App\Http\Controllers\Study;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LessonsGroup;
use App\Lesson;
use App\L_block;
use Session;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create()
    {
        $course_id = Session::get('course_id');
        $course = LessonsGroup::whereId($course_id)->first();
        return view('study.lessons.create', ['course' => $course ]);
    }

    public function store(Request $request)
    {
        Lesson::create($request->all());
        return redirect()->route('lesson.edit', ['id' => Lesson::whereTitle($request->title)->first()->id ]);
    }

    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        $course = LessonsGroup::find($lesson->lesson_group_id);
        return view('study.lessons.show', ['lesson' => $lesson, 'course' => $course ]);
    }

    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        $course = LessonsGroup::find($lesson->lesson_group_id);
        $l_blocks = L_block::whereLesson_id($lesson->id)->orderBy('name', 'asc')->get();
        return view('study.lessons.edit', ['lesson' => $lesson, 'course' => $course, 'l_blocks' => $l_blocks ]);
    }

    public function update(Request $request, $id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->update($request->all());
        return redirect()->route('lesson.show', ['id' => $id ]);
    }

    public function destroy($id)
    {
        $lesson = Lesson::findOrFail($id);
        $course = LessonsGroup::findOrFail($lesson->lesson_group_id);
        $lesson->delete();
        return redirect('/lessons_group/'.$course->id.'#lessons');
    }
}
