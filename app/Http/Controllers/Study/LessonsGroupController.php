<?php

namespace App\Http\Controllers\Study;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\LessonsGroup;
use App\Lesson_category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class LessonsGroupController extends Controller
{
    public function index()
    {
        $lessons_groups = LessonsGroup::paginate(10);
        return view('study.lessons_group.index', compact('lessons_groups'));
    }

    public function create()
    {
        return view('study.lessons_group.create', ['categories'=>Lesson_category::all()]);
    }

    public function store(Request $request)
    {
        LessonsGroup::create($request->except('image'));
        $lessons_group = LessonsGroup::whereUser_id($request->user_id)->whereTitle($request->title)->first();
        if($lessons_group) {
            $file = $request->file('image');
            if($file) {
                //$filename = $file->getClientOriginalName(); 
                $filename = $lessons_group->id . '-thumbnail.jpg';
                Storage::disk('local')->put('courses/'.$filename, File::get($file));
                $lessons_group->image = $filename;
                $lessons_group->update();
            }
        }
        
        return redirect()->route('lessons_group.index');
    }
    
    public function getLessonsGroupImage($filename)
    {
        $file = Storage::disk('local')->get('courses/'.$filename);
        return new Response($file, 200);
    }

    public function show($id)
    {
        $lessons_group = LessonsGroup::findOrFail($id);
        return view('study.lessons_group.show', compact('lessons_group'));
    }
     
    public function edit($id)
    {
        $lessons_group = LessonsGroup::findOrFail($id);
        return view('study.lessons_group.edit', [
            'lessons_group' => $lessons_group,
            'categories' => Lesson_category::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $lessons_group = LessonsGroup::findOrFail($id);
        $lessons_group->update($request->except('image'));
        $lessons_group = LessonsGroup::whereUser_id($request->user_id)->whereTitle($request->title)->first();
        if($lessons_group) {
            $file = $request->file('image');
            if($file) {
                //$filename = $file->getClientOriginalName(); 
                $filename = $lessons_group->id . '-thumbnail.jpg';
                Storage::disk('local')->put('courses/'.$filename, File::get($file));
                $lessons_group->image = $filename;
                $lessons_group->update();
            }
        }
        return redirect()->route('lessons_group.show', ['id' => $id]);
    }

    public function destroy($id)
    {
        /*$lessons_group = LessonsGroup::findOrFail($id);
        $lessons_group->delete();*/
        LessonsGroup::destroy($id);
        return redirect()->route('lessons_group.index', ['lessons_groups' => LessonsGroup::paginate(10)]);
    }
}
