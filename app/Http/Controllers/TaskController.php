<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getTask($id){
        return Task::where('id',$id)->get()->toJson();
    }
}
