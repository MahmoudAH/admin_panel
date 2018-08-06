@extends('layouts.dashboard')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit Country</h1>
      </div>
    </div>
    <hr class="m-t-0">

        <form action="{{route('country.update', $country->id)}}"
         method="POST" enctype="multipart/form-data">
                   {{csrf_field()}}

          {{method_field('PUT')}}
    <div class="columns">
      <div class="column">
          <div class="field">
            <label for="title" class="label">Title:</label>
            <p class="control">
              <input type="text" class="input" name="title" id="title" value="{{$country->title}}">
            </p>
          </div>

          

          <div class="field">
            <label for="image" class="label">
                    <img src="{{$country->image}}" alt="image:"></img>
            </label>
            <p class="control">
              <input type="file" class="input" name="image" id="image">
            </p>
</div>
         


              
          <button class="button is-primary" style="margin:30px 0  ">Save Country</button>
        </form>
      </div>
    </div>

  </div> <!-- end of .flex-container -->
@endsection


@section('scripts')
  <script>

    var app = new Vue({
      el: '#app',
      data: {
        password_options: ''
      }
    });

  </script>
@endsection
