@extends('layouts.dashboard')
@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
       <div class="column">
          <h1 class="title"><i class="fa fa-globe" aria-hidden="true"></i>
All countries</h1>
        </div>
        <div class="column">
          <a href="{{route('country.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Add Country</a>
        </div>
        <div class="column">
 
       <input type="text" class="form-controller" placeholder="search" style="height: 33px ;width: 300px" id="search" name="search"></input>      </div>
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
          <table class="table is-wide table-stripped" >
            <thead>
              <tr>
                <th width="30%"> title</th>
                <th width="30%">image</th>
                <th width="40%"><p style="margin-left:70px ">actions</p> </th>
                
              </tr>
            </thead>

            <tbody>
           @foreach ($countries as $country)

              <tr>
                <td>{{$country->title}}</td>
                <td><img src="{{$country->image}}"></img>
</td>
<td class="has-text-right">
<a  class="button is-outlined m-r-5" 
href="{{route('country.edit', $country->id)}}" style="background-color: #4CAF50"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
Edit</a>
<form method="POST" action="{{ route('country.destroy',$country->id)}}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
 <button  class="button is-light" type="submit" style="display: inline-block;margin:-35px -100px 0 0;background-color: #f44336">
<i class="fa fa-trash" aria-hidden="true"></i>
Delete</button></form>
</td>                
              </tr>
                            @endforeach

            </tbody>
          </table>
            <div>  {{ $countries->links() }} 
</div>
        </div>
      </div> <!-- end of .card -->
<!--<div class="row" style="margin: 10px;padding: 10px">
        <a href="" class="button is-primary is-pulled-right"style="margin: 10px;padding: 10px" >Previous</a>
        <a href=" " class="button is-primary is-pulled-right" style="margin: 10px;padding: 10px">Next</a>
    </div>-->
    </div>

@endsection
@section('scripts')
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script type="text/javascript">
  $('#search').on('keyup', function(){
  $value=$(this).val();
  $.ajax({
    type : 'get',
    url : '{{URL::to('search')}}',
    data :{'search':$value},
    success :function(data){
      $('tbody').html(data);
    }
  });
  })
</script>
@endsection
