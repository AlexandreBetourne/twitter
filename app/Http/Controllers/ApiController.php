<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Tweet;

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

  public function index(Tweet $tweet)
  {

    $tweets = $tweet
              ->join('users', 'tweets.username', '=', 'users.username')
              ->get();

    return $tweets;
  }

  public function post(Tweet $tweet, Request $request)
  {

    $tweet->forceCreate([
      'username' => $request->username,
      'message' => $request->tweet_message
    ]);

    return redirect("/");
  }

  public function delete(Tweet $tweet, Request $request)
  {
    $tweet->where('tweet_id', '=', $request->tweet_id)->delete();
    return redirect("/");
  }
}
