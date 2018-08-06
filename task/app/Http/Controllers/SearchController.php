<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Country;
use Response;
class SearchController extends Controller
{
    public function search(Request $request)
 
{
if($request->ajax())
     {
      $output = '';
       $countries = DB::table('countries')
         ->where('title', 'like', '%'.$request->search.'%')
         ->get();
         if($countries)
         {
        foreach ($countries as $key => $country) {
         $output .= 
         ' <tr>'.
         
        '<td>'. $country->title.'</td>'.
         '<td>'.
          $country->image.'</td>'.
         '</tr>';
          }
          return Response($output);
         }
         
     
}}
}
