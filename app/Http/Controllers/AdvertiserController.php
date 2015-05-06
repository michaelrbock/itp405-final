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
        $jobs = Job::where('advertiser_id', '=', $request->user()->advertiser_id)->get();

        return view('advertiser', [
            'jobs' => $jobs
        ]);
    }

}
