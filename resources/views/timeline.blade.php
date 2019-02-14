@extends('layouts.app')

@section('content')
<div class="container">
  <div class="columns is-2">

    <div class="column is-one-quarter ">
      <div class="content white-block">
        <section class="section home_profile">
          <a href="/profile">
            <div class="image">
              <img src="{{Auth::user()->img}}">
            </div>
          </a>

          <div class="columns">
            <div class="column">
              <p class="is-size-5">{{ Auth::user()->fullname }}</p>
              <p class="is-size-7">@ {{ Auth::user()->username }}</p>
            </div>
          </div>

          <div class="columns">
            <div class="column">
              <p class="is-size-7">Tweets</p>
              <p><strong>100</strong></p>
            </div>
            <div class="column">
              <p class="is-size-7">Abonnements</p>
              <p><strong>100</strong></p>
            </div>
            <div class="column">
              <p class="is-size-7">Abonnés</p>
              <p><strong>100</strong></p>
            </div>
          </div>

        </section>
      </div>

    </div>

    <div class="column">
      <div class="content white-block">
        <section class="section">
          <form class="" action="{{ route('tweet.post') }}" method="post">
            {{ csrf_field() }}

            <input type="hidden" ref="user_id" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" ref="fullname" name="fullname" value="{{ Auth::user()->fullname }}">
            <article class="media">
              <figure class="media-left">
                <p class="image">
                  <img src="{{ Auth::user()->img }}">
                </p>
              </figure>
              <div class="media-content">
                <div class="field">
                  <p class="control">
                    <textarea class="textarea" ref="tweet_message" name="tweet_message" placeholder="Quoi de neuf ?" style="resize: none;"></textarea>
                  </p>
                </div>
                <nav class="level">
                  <div class="level-left">
                    <div class="level-item">
                      <button type="submit" class="button is-info" name="button" @click="submitTweet()">Tweeter</button>
                    </div>
                  </div>
                </nav>
              </div>
            </article>
          </form>
        </section>

        <section class="section">
            <div v-if="loading == true">
              Loading..
            </div>

            <article v-else class="media" v-for="item in tweets.slice().reverse()">
              <figure class="media-left">
                <p class="image is-64x64">
                  <img :src="item.user.img">
                </p>
              </figure>
              <div class="media-content">
                <div class="content">
                  <p>
                    <strong>@{{item.user.fullname}}</strong> <small>@@{{item.user.username}}</small> <small>@{{item.created_at}}</small>
                    <br>
                    @{{item.message}}
                  </p>
                </div>
              </div>
              <div class="media-right" v-if="item.user.username == '{{Auth::user()->username}}'">
                <form class="" action="{{ route('tweet.delete') }}" method="delete">
                  <input type="hidden" name="tweet_id" :value="item.tweet_id">
                  <button type="submit" class="delete"></button>
                </form>
              </div>
            </article>
          </section>
      </div>
    </div>
  </div>



</div>
@endsection
