<?php

namespace App\Http\Controllers;

use DB;
use App\Subproject;
use Response;
use Illuminate\Http\Request;

class SearchController3 extends Controller
{
    public function search3(Request $request)
    {
      if ($request->ajax()) {
          $output = '';
          $subprojects  = DB::table('subprojects')
            ->where('title', 'like', '%'.$request->search.'%')
            ->get();
            if($subprojects){
               foreach ($subprojects as $key => $subproject) {
                $output .= 
                ' <tr>'.
              '<td>'.$subproject->title.'</td>'.
              '<td>'.$subproject->project.'</td>'.
              '</tr>';
               }
             return Response($output);
          }
      }
    }
}