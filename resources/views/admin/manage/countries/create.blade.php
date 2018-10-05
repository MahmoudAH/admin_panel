@extends('layouts.dashboard')
@section('content')
@include('partials.error')

  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Create New Country</h1>
      </div>
    </div>
    <hr class="m-t-0">
    <form action="{{route('country.store')}}" method="POST" 
    enctype="multipart/form-data">
      {{csrf_field()}}
          <div class="columns">
        <div class="column">
          <div class="field">

                     <div class="panel-body" style="background-color: #ffcdd2;text-align: center;color: #009688;padding: 0;margin: 0 80px;font-size: 20px">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
</div>

            
            <label for="title" class="label">Title:</label>
            <p class="control">
              <input type="text" class="input" name="title" id="title">
            </p>

            @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
             @endif
          </div>

          <div class="field">
            <label for="image" class="label">Image:</label>
            <p class="control">
              <input type="file" class="input" name="image" id="image">
            </p>
            @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
          </div>

          

                  </div> <!-- end of .column -->

        </div> <!-- end of .columns for forms -->
     
      <div class="columns">
        <div class="column">
          <hr />
          <button class="button is-primary is-pulled-right" style="width: 250px;">Create New Country</button>
        </div>
      </div>
    </form>

  </div> <!-- end of .flex-container -->
@endsection


