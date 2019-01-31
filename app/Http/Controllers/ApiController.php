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

    $tweets = DB::table('tweets')
            ->join('users', 'tweets.username', '=', 'users.username')
            ->get();
  
    return $tweets;
  }
}
