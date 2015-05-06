<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Job;

class AdminController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $jobs = Job::with('advertiser')->with('blogger')->get();

        return view('admin', [
            'jobs' => $jobs
        ]);
    }

}
