<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
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

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index(User $user, $username)
  {
      return view('profile');
  }

  public function post(User $user, Request $request)
  {
    if ($request->file('img_update_file')) {
      $path = $request->file('img_update_file')->store('avatars');
      $user
      ->where('username', '=', $request->username_update)
      ->update([
        'img' => '/storage/'.$path
      ]);
    }

    $user
    ->where('username', '=', $request->username_update)
    ->update([
      'fullname' => $request->fullname_update,
      'email' => $request->email_update
    ]);


    return redirect('/');
  }
}
