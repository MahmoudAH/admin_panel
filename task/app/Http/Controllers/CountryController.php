<?php

namespace App\Http\Controllers;
use App\Country;
use App\Project;
use Image;
use Session;
use Storage;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
class CountryController extends Controller
{

    public function index()
    {
       $countries =Country::paginate(5);

        return view('admin.manage.countries.index',compact('countries'));
    }
      public function create()
    {
      $countries =Country::all();
      return view('admin.manage.countries.create',compact('countries'));
    }

    ///show

    public function show($id)
{

    $country = Country::find($id);

    $previous = Country::where('id', '<', $country->id)->max('id');

    $next = Country::where('id', '>', $country->id)->min('id');
   //$country = Country::find(5); 

    return View::make('country.show')->with('previous', $previous)->with('next', $next);
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
         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

      ]);

      $country = new Country();

     $country->title = $request->title;

     $image = Input::file('image');
     $filename  = time() . '.' . $image->getClientOriginalName();
     $path = public_path('images/' . $filename);
     Image::make($image->getRealPath())->resize(100,100)->save($path);
     $country->image = 'images/' . $filename;     
     $country->save();
     return back()->with('message', 'Country created!');
  
}
    public function edit($id)
    {
      $country = Country::findOrFail($id);
      return view('admin.manage.countries.edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
    /**/
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'title' => 'required|max:255',

      ]);

      
      $country = Country::findOrFail($id);
      $country->title = $request->title;
      if ($request->file('image')){

      $image = Input::file('image');
      $filename  = time() . '.' . $image->getClientOriginalName();
      $path = public_path('images/' . $filename);
      Image::make($image->getRealPath())->resize(100,100)->save($path);
       $country->update(['image'=>"/images/{$filename}"]);
}
      $country->save();

      //Session::flash('success', 'Successfully update the '. $country->title . ' title in the database.');
      return redirect()->route('country.index', $id)->with('message', 'Successfully updated!');
    }
    
    public function destroy($id)
    {
     
      $country = Country::findOrFail($id);
      //unlink(public_path(). $country->image->file);

      $country->delete();
      return back()->with('message', 'Successfully deleted!');


    }
}
