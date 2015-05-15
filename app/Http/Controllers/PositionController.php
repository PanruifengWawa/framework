<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Position;

class PositionController extends Controller {

    /**
     * List position
     */
    public function index() {
      $keyword = \Request::input('keyword');
      $positions = null;
      if ($keyword) {
        $positions = Position::where('title', 'like', '%' . $keyword . '%')->get();
      }
      else {
        $positions = Position::all();
      }
      return $this->responseJSON($positions->toJson());
    }
}
