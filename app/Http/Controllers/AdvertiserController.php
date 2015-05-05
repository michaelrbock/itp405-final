<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Job;

class AdvertiserController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $jobs = Job::where('user_id', '=', $request->user()->id)->get();

        return view('advertiser', [
            'jobs' => $jobs
        ]);
    }

}
