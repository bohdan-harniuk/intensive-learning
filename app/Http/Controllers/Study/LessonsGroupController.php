<?php

namespace App\Http\Controllers\Study;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LessonsGroup;

class LessonsGroupController extends Controller
{
    public function index()
    {
        $lessons_groups = LessonsGroup::paginate(10);
        return view('study.lessons_group.index', compact('lessons_groups'));
    }

    public function create()
    {
        return view('study.lessons_group.create');
    }

    public function store(Request $request)
    {
        LessonsGroup::create($request->all());
    }

    public function show($id)
    {
        $lessons_group = LessonsGroup::findOrFail($id);
        return view('study.lessons_group.show', compact('lessons_group'));
    }
     
    public function edit($id)
    {
        $lessons_group = LessonsGroup::findOrFail($id);
        return view('study.lessons_group.edit', compact('lessons_group'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
