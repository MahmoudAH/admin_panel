<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Country;
use App\Project;
use App\Subproject;
use Image;
use Session;
use Illuminate\Support\Facades\Input;

class ProjectController extends Controller
{
    
      public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
       $projects =Project::paginate(5);
        return view('admin.manage.projects.index',compact('projects'));
    }
      public function create()
    {
      $projects =Project::all();
      return view('admin.manage.projects.create',compact('projects'));
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
         'country' => 'required|max:255', 
         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 

       ]); 

       $project = new Project();

       $project->title = $request->title;
       $project->country = $request->country;

       $image = Input::file('image');
       $filename  = time() . '.' . $image->getClientOriginalName();
       $path = public_path('images/' . $filename);
       Image::make($image->getRealPath())->resize(100,100)->save($path);
       $project->image = 'images/' . $filename;     
       $project->save();
       return back()->with('message', 'project created!');
  
}
    public function edit($id)
    {
      $project = Project::findOrFail($id);
      return view('admin.manage.projects.edit',compact('project'));
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
          'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 



      ]);

      $project = Project::findOrFail($id);
      $project->title = $request->title;
      $project->country = $request->country;
      if ($request->file('image')){
      $image = Input::file('image');
      $filename  = time() . '.' . $image->getClientOriginalName();
      $path = public_path('images/' . $filename);
      Image::make($image->getRealPath())->resize(100,100)->save($path);
      $project->update(['image'=>"/images/{$filename}"]);

}
     $project->save();
     return redirect()->route('project.index', $id)->with('message', 'Successfully updated!');
    }

    public function destroy($id)
    {
     
      $project = Project::findOrFail($id);
       $project->delete();
      return back()->with('message', 'Successfully deleted!');
}
public function show($id){
	
}


}
