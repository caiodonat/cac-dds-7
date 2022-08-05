<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

  public function setNumber_desk(Request $rt)
  {
    try {
      DB::table('users')
        ->where('id', $rt->input('id_user'))
        ->update([
          'number_desk' => $rt->input('number_desk')
        ]);

      $r = DB::table('users')
        ->where('id', $rt->input('id_user'))
        ->get();

      return json_encode(['r' => $r, 'success' => true], JSON_PRETTY_PRINT);
    } catch (\Throwable $th) {
      return json_encode(['r' => $th, 'success' => false], JSON_PRETTY_PRINT);
    }
  }

  public function show($id)
  {
    return User::findOrFail($id);
  }
}
