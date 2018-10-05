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

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //show country data from country table
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

    //implement previous and next link
    public function show($id)
    {
        $country = Country::find($id);
        $previous = Country::where('id', '<', $country->id)->max('id');
        $next = Country::where('id', '>', $country->id)->min('id');
        return View::make('country.show')->with('previous', $previous)->with('next', $next);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 

   //store new country data in country table   
    public function store(Request $request)
    {
        $this->validate($request, [
          'title' => 'required|max:100',
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

   // edit country data
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

     //update country data  
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
      return redirect()->route('country.index', $id)->with('message', 'Successfully updated!');
    }
   
   //delete country data 
    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return back()->with('message', 'Successfully deleted!');
    }
}
