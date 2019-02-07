@extends('layouts.app')

@section('content')
<div class="container" id="profile">
  <section class="section white_block">
    <form class="" action="{{ route('profile.post') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

      <input id="img_update" type="file" class="is-hidden" name="img_update_file" accept="image/*" />
      <label for="img_update" class="image">
          <img src="{{ Auth::user()->img }}">
          <div class="img_modifier">
            <span>Modifier</span>
          </div>

      </label>

      <h1 class="title">Profile</h1>



      <input type="hidden" name="username_update" value="{{ Auth::user()->username }}">
      <div class="field">
        <label class="label">Full Name</label>
        <div class="control">
          <input name="fullname_update" class="input form-control{{ $errors->has('fullname') ? ' is-invalid' : '' }}" type="text" value="{{ Auth::user()->fullname }}">

          @if ($errors->has('fullname'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('fullname') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="field">
        <label class="label">Email</label>
        <div class="control">
          <input name="email_update" class="input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" value="{{ Auth::user()->email }}">

          @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="field is-grouped">
        <p class="control">
          <button type="submit" class="button is-info">Submit</button>
        </p>
        <p class="control">
          <a class="button is-light" href="/">
            Cancel
          </a>
        </p>
      </div>
    </form>
  </section>

</div>
@endsection
