@extends('layouts.dashboard')
@section('content')
  <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">ALL PROJECTS</h1>
        </div>
        <div class="column">
          <a href="{{route('project.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Add Project</a>
        </div>
       <div class="column">
 
       <input type="text" class="form-controller" placeholder="search" style="height: 33px ;width: 300px" id="search2" name="search2"></input>      </div>
      </div>
      <hr class="m-t-0">

                     <div class="panel-body" style="background-color: #ffcdd2;text-align: center;color: #009688;padding: 0;margin: 0 80px;font-size: 20px">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
</div>

      <div class="card">
        <div class="card-content">
          <table class="table is-wide" style="">
            <thead>
              <tr>
                <th > title</th>
                <th >image</th>
                <th >countrys</th>
                <th  ><p style="margin-left: 134px">actions</p> </th>

                
              </tr>
            </thead>

            <tbody>
           @foreach ($projects as $project)

              <tr>
                <td>{{$project->title}}</td>
                <td><img src="{{$project->image}}"></img>
                <td>{{$project->country}}</td>

<td class="has-text-right" width="40%">
<a class="button is-outlined m-r-5" 
href="{{route('project.edit', $project->id)}}" style="background-color: #4CAF50" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
Edit</a>
<form method="POST" action="{{ route('project.destroy',$project->id)}}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
 <button  class="button is-light" type="submit" style="display: inline-block;margin:-35px -100px 0 0;background-color: #f44336">
<i class="fa fa-trash" aria-hidden="true"></i>
Delete</button></form>
<a style="margin-right: -283px;margin-top: -60px;background-color: #80CBC4" class="button is-outlined m-r-5 " href="/subproject"  ><i class="fa fa-pencil-square-o" aria-hidden="true">
Show subProjects</a>
</td>                
   </tr>
   @endforeach
 </tbody>
</table>

          <div>  {{ $projects->links() }} 
</div>
        </div>
      </div> <!-- end of .card -->

    </div>



@endsection

@section('scripts')
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script type="text/javascript">
  $('#search2').on('keyup', function(){
  $value=$(this).val();
  $.ajax({
    type : 'get',
    url : '{{URL::to('search2')}}',
    data :{'search2':$value},
    success :function(data){
      $('tbody').html(data);
    }
  });
  })
</script>
@endsection

@section('scripts')
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script type="text/javascript">
  $('#search2').on('keyup', function(){
  $value=$(this).val();
  $.ajax({
    type : 'get',
    url : '{{URL::to('search2')}}',
    data :{'search2':$value},
    success :function(data){
      $('tbody').html(data);
    }
  });
  })
</script>
@endsection
