<?php

namespace App\Http\Controllers\Study;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\L_block;
use App\Lesson;

class LBlockController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        
        $lesson_id = $request['lesson_id'];
        $l_blocks = L_block::whereLesson_id($lesson_id)->orderBy('name', 'asc')->get();
        $name = $this->getBlockName($l_blocks);
        $request['name'] = $name;
        L_block::create($request->all());
        return redirect()->route('lesson.edit', ['id' => $lesson_id]);
    }
    
    public function getBlockName($l_blocks)
    {
        if($l_blocks->isNotEmpty()) {
            if($l_blocks->count() > 1) {
                $alphabet = range('A', 'Z');
                $last_name = $l_blocks->last()->name;
                return $alphabet[array_search($last_name, $alphabet)+1];
            } else {
                if($l_blocks->first()->name == 'A')
                    return 'B';
                else
                    return 'A';
            }
        } else
            return 'A';
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $l_block = L_block::findOrFail($id);
        $lesson_id = $request['lesson_id'];
        
        if(isset($request['put'])) {
            $l_block->update($request->all());
        } elseif(isset($request['put-up'])) {
            $this->updatePos($lesson_id, $l_block, 'up');
        } elseif(isset($request['put-down'])) {
            $this->updatePos($lesson_id, $l_block, 'down');
        }
        
        return redirect()->route('lesson.edit', ['id' => $lesson_id]);
    }
    
    public function updatePos($lesson_id, $l_block, $action)
    {
        if($action == 'up') {
            $l_blocks = L_block::whereLesson_id($lesson_id)->orderBy('name', 'desc')->get();
            
        } elseif($action == 'down') {
            $l_blocks = L_block::whereLesson_id($lesson_id)->orderBy('name', 'asc')->get();
        }
        for($i = 0; ; $i++) {
            if($l_blocks[$i]->name == $l_block->name) {
                $rv = $l_block->name;
                $l_block->name = $l_blocks[$i+1]->name;
                $l_block->update();
                $l_blocks[$i+1]->name = $rv;
                $l_blocks[$i+1]->update();
                return;
            }
        }
    }
    

    public function destroy($id)
    {
        $l_block = L_block::findOrFail($id);
        $lesson_id = $l_block->lesson_id;
        $l_block->delete();
        return redirect()->route('lesson.edit', ['id' => $lesson_id]);
    }
}
