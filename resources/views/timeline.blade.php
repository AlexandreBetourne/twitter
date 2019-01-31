@extends('layouts.app')

@section('content')
<div class="container">

        <form class="" action="{{ route('tweet.post') }}" method="post">
          {{ csrf_field() }}
          <div class="field">
            <div class="control">
              <textarea class="textarea" placeholder="Quoi de neuf ?" name="tweet-writer"></textarea>
            </div>
          </div>
          <div class="field is-grouped">
            <div class="control">
              <button class="button is-link">Tweeter</button>
            </div>
          </div>
        </form>

</div>
@endsection
