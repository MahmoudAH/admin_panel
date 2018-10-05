@extends('layouts.dashboard')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit subProject</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
      <div class="column">
        <form action="{{route('subproject.update', $subproject->id)}} "
          method="POST" enctype="multipart/form-data">
         
          {{csrf_field()}}
          {{method_field('PUT')}}
          
          <div class="field">
            <label for="title" class="label">Title:</label>
            <p class="control">
              <input type="text" class="input" name="title" id="title" value="{{$subproject->title}}">
            </p>
          </div>
             
             <div class="field">
            <label for="project" class="label">project:</label>
            <p class="control">
              <input type="text" class="input" name="project" id="project" value="{{$subproject->project}}">
            </p>
          </div>
         

              
          <button class="button is-primary" style="margin:30px 0  ">Save SubProject</button>
        </form>
      </div>
    </div>

  </div> <!-- end of .flex-container -->
@endsection

