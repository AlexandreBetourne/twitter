<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\User;
use Auth;

class ApiController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(Tweet $tweet, Request $request)
  {
    $tweets = $tweet->whereIn(
      'user_id', $request->user()->follows()->pluck('users.id')->push($request->user()->id)
    )->with('user');

    $d = $tweets->get();

    return $d;
  }

  public function post(Tweet $tweet, Request $request)
  {

    $tweet->forceCreate([
      'user_id' => $request->user_id,
      'message' => $request->tweet_message
    ]);

    return redirect("/");
  }

  public function delete(Tweet $tweet, Request $request)
  {
    $tweet->where('tweet_id', '=', $request->tweet_id)->delete();
    return redirect("/");
  }

  public function followers(Request $request)
  {

    $followers = $request->user()->followers();
    $d = $followers->get();

    return $d;

  }

  public function follows(Request $request)
  {

    $follows = $request->user()->follows();
    $d = $follows->get();

    return $d;
  }

  public function profile(User $user, $username)
  {

    return $user->where('username', $username)->first();
  }
}
