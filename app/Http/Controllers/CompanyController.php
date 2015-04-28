<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Company;

class CompanyController extends Controller {

    /**
     * List company 
     */
    public function index() {
      $keyword = \Request::input('keyword');
      $companies = null;
      if ($keyword) {
        $companies = Company::where('name', 'like', '%' . $keyword . '%')->get();
      }
      else {
        $companies = Company::all();
      }
      return $this->responseJSON($companies->toJson());
    }
}
