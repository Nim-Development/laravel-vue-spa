<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Member;
use App\Project;

class ApiController extends Controller
{
    //Super Basic API!

    public function team(){
        return Member::all();
    }

    public function projects($x){
        if($x == 'all'){
            return Project::all();
        }
        return Member::find($x)->projects;
    }

    public function add_project(Request $request){
        $project = new Project();
            $project->member_id = $request->member_id;
            $project->title = $request->title;
            $project->due = $request->due;
            $project->status = $request->status;
        
        if ($project->save()){
            return [ 'status' => 'success' ];
        }
        return [ 'status' => 'fail' ];
    }
}
