<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Project;
use App\Subproject;
use Session;
use Illuminate\Support\Facades\Input;


class SubprojecetController extends Controller
{
    public function index()
    {
       $subprojects =Subproject::paginate(5);

        return view('admin.manage.subprojects.index',compact('subprojects'));
    }
      public function create()
    {
      $subprojects = Subproject::all();
      return view('admin.manage.subprojects.create',compact('subprojects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */    
    public function store(Request $request)
    {
      $this->validate($request, [
        'title' => 'required|max:255',
         'project' => 'required|max:255',

      ]);

      $subproject = new Subproject();

       $subproject->title = $request->title;
       $subproject->project = $request->project;
      $subproject->save();

      
 

      return back()->with('message', 'subproject created!');
  
}
public function edit($id)
    {
      $subproject = Subproject::findOrFail($id);
      return view('admin.manage.subprojects.edit',compact('subproject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'title' => 'required|max:255',
         'country' => 'required|min:3',

      ]);

      $subproject = Subproject::findOrFail($id);
      $subproject->title = $request->title;
      $subproject->project = $request->project;


      $subproject->save();

      Session::flash('success', 'Successfully update the '. $subproject->title . ' title in the database.');
      return redirect()->route('subproject.index', $id);
    }

    public function destroy($id)
    {
     
      $subproject = Subproject::findOrFail($id);
       $subproject->delete();
      return back();

}

public function show($id){
	
}

}
