<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Job;

class BloggerController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $jobs = Job::with('user')->where('status', '=', 'new')->get();

        return view('blogger', [
            'jobs' => $jobs
        ]);
    }

}
