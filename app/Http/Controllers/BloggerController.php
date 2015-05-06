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
        $current_jobs = Job::with('advertiser')
            ->where('blogger_id', '=', $request->user()->blogger_id)->get();
        $available_jobs = Job::with('advertiser')->where('status', '=', 'new')->get();

        return view('blogger', [
            'current_jobs' => $current_jobs,
            'available_jobs' => $available_jobs
        ]);
    }

    public function acceptJob(Request $request, $id)
    {
        $job = Job::find($id);

        $job->status = 'taken';
        $job->blogger_id = $request->user()->blogger_id;
        $job->save();

        return redirect('/blogger');
    }

}
