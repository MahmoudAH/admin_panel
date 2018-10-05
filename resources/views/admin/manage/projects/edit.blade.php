@extends('layouts.dashboard')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit Project</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
      <div class="column">
        <form action="{{route('project.update', $project->id)}}"
          method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          {{method_field('PUT')}}
          
          <div class="field">
            <label for="title" class="label">Title:</label>
            <p class="control">
              <input type="text" class="input" name="title" id="title" value="{{$project->title}}">
            </p>
          </div>
             
             <div class="field">
            <label for=country" class="label">country:</label>
            <p class="control">
              <input type="text" class="input" name="country" id="country" value="{{$project->country}}">
            </p>
          </div>



          <div class="field">
            <label for="image" class="label">
     <img src="{{$project->image}}" alt="image:"></img>
</label>
            <p class="control">
              <input type="file" class="input" name="image" id="image"     value="">

            </p>
</div>
         


              
          <button class="button is-primary" style="margin:30px 0  ">Save Project</button>
        </form>
      </div>
    </div>

  </div> <!-- end of .flex-container -->
@endsection