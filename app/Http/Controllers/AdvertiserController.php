<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Job;

class AdvertiserController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('advertiser');
    }

    public function index(Request $request)
    {
        $jobs = Job::where('advertiser_id', '=', $request->user()->advertiser_id)->get();

        return view('advertiser', [
            'jobs' => $jobs
        ]);
    }

    public function acceptJob(Request $request, $id)
    {
        $job = Job::find($id);

        $job->status = 'accepted';
        $job->save();

        return redirect('/advertiser')
            ->with('success', 'You have accepted this job: ' . $job->title);
    }

    public function rejectJob(Request $request, $id)
    {
        $job = Job::find($id);

        $job->status = 'new';
        $job->bid = NULL;
        $job->blogger_id = NULL;
        $job->save();

        return redirect('/advertiser')
            ->with('success', 'You rejected this job: ' . $job->title);
    }

}
