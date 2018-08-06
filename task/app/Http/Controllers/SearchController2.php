<?php

namespace App\Http\Controllers;
use DB;
use App\Project;
use Response;
use Illuminate\Http\Request;

class SearchController2 extends Controller
{
     public function search2(Request $request)
 
{
if($request->ajax())
     {
      $output = '';
       $projects  = DB::table('projects')
         ->where('title', 'like', '%'.$request->search.'%')
         ->orWhere('country', 'like', '%'.$request->search.'%')
         ->get();
         if($projects)
         {
        foreach ($projects as $key => $project) {
         $output .= 
         ' <tr>'.
         
        '<td>'.$project->title.'</td>'.
        '<td>'.$project->country.'</td>'.

         '</tr>';
          }
          return Response($output);
         }
         
     
}}
}
