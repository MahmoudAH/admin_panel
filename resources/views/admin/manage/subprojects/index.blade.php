@extends('layouts.dashboard')
@section('content')
  <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title"><i class="fa fa-globe" aria-hidden="true"></i>
ALL SubProjects</h1>
        </div>
        <div class="column">
          <a href="/subproject/create" class="button is-primary is-pulled-right">
            <i class="fa fa-product-hunt" aria-hidden="true" style="padding-right: 5px"></i> Add SubProject</a>
        </div>
       <div class="column">
 
       <input type="text" class="form-controller" placeholder="search" style="height: 33px ;width: 250px" id="search3" name="search3"></input>      </div>
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
          <table class="table is-wide">
            <thead>
              <tr>
                <th > title</th>
                
                <th >project</th>

                <th >actions</th>
                
              </tr>
            </thead>

            <tbody>
           @foreach ($subprojects as $subproject)

              <tr>
                <td width="30%">{{$subproject->title}}</td>
                <td width="30%">{{$subproject->project}}</td>

<td class="has-text-right" width="40%">
<a class="button is-outlined m-r-5" 
href="{{route('subproject.edit', $subproject->id)}}" style="background-color: #4CAF50;margin-right: 400px" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
Edit</a>
<form method="POST" action="{{ route('subproject.destroy',$subproject->id)}}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
 <button  class="button is-light" type="submit" style="display: inline-block;margin:-35px 300px 0 0;background-color: #f44336">
<i class="fa fa-trash" aria-hidden="true"></i>
Delete</button></form>
</td>                
              </tr>
                            @endforeach

            </tbody>
          </table>

          <div>  {{ $subprojects->links() }} 
</div>
        </div>
      </div> <!-- end of .card -->

    </div>
@endsection


@section('scripts')
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script type="text/javascript">
  $('#search3').on('keyup', function(){
  $value=$(this).val();
  $.ajax({
    type : 'get',
    url : '{{URL::to('search3')}}',
    data :{'search':$value},
    success :function(data){
      $('tbody').html(data);
    }
  });
  })
</script>
@endsection

