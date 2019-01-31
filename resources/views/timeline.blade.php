@extends('layouts.app')

@section('content')
<div class="container">
  <section class="section">
    <form class="" action="{{ route('tweet.post') }}" method="post">
      {{ csrf_field() }}
      <article class="media">
        <figure class="media-left">
          <p class="image is-64x64">
            <img src="https://bulma.io/images/placeholders/128x128.png">
          </p>
        </figure>
        <div class="media-content">
          <div class="field">
            <p class="control">
              <textarea class="textarea" placeholder="Quoi de neuf ?"></textarea>
            </p>
          </div>
          <nav class="level">
            <div class="level-left">
              <div class="level-item">
                <button type="submit" class="button is-info" name="button">Submit</button>
              </div>
            </div>
          </nav>
        </div>
      </article>
    </form>
  </section>

  <section class="section">
    <article class="media" v-for="item in items">
      <figure class="media-left">
        <p class="image is-64x64">
          <img src="https://bulma.io/images/placeholders/128x128.png">
        </p>
      </figure>
      <div class="media-content">
        <div class="content">
          <p>
            <strong>@{{item.name}}</strong> <small>@johnsmith</small> <small>31m</small>
            <br>
            @{{item.message}}
          </p>
        </div>
        <nav class="level is-mobile">
          <div class="level-left">
            <a class="level-item">
              <span class="icon is-small"><i class="fas fa-reply"></i></span>
            </a>
            <a class="level-item">
              <span class="icon is-small"><i class="fas fa-retweet"></i></span>
            </a>
            <a class="level-item">
              <span class="icon is-small"><i class="fas fa-heart"></i></span>
            </a>
          </div>
        </nav>
      </div>
      <div class="media-right">
        <button class="delete"></button>
      </div>
    </article>
  </section>



</div>
@endsection