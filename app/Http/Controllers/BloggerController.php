<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Job;

class BloggerController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('blogger');
    }

    public function index(Request $request)
    {
        $current_jobs = Job::with('advertiser')
            ->where('blogger_id', '=', $request->user()->blogger_id)
            ->where(function($query) {
                $query->where('status', '=', 'bid')
                      ->orWhere('status', '=', 'accepted')
                      ->orWhere('status', '=', 'completed');
            })
            // ->whereRaw("status = 'bid' OR status = 'accepted' OR status = 'completed'")
            ->get();
        $available_jobs = Job::with('advertiser')->where('status', '=', 'new')->get();

        return view('blogger', [
            'current_jobs' => $current_jobs,
            'available_jobs' => $available_jobs
        ]);
    }

    public function bidJob(Request $request, $id)
    {
        if (!$request->has('bid') || $request->input('bid') < 0) {
            return redirect('/blogger')
                ->withInput()
                ->withErrors(['Must bid at lest $0']);
        }

        $job = Job::find($id);

        $job->status = 'bid';
        $job->bid = $request->input('bid');
        $job->blogger_id = $request->user()->blogger_id;
        $job->save();

        return redirect('/blogger')
            ->with('success', 'You have bid for this job: ' . $job->title);
    }

    public function completeJob(Request $request, $id)
    {
        if (!$request->has('live_url') ||
            filter_var($request->input('live_url'), FILTER_VALIDATE_URL) === FALSE) {
            return redirect('/blogger')
                ->withInput()
                ->withErrors(['Must be a valid URL']);
        }

        $job = Job::find($id);

        $job->status = 'completed';
        $job->live_url = $request->input('live_url');
        $job->save();

        return redirect('/blogger')
            ->with('success', 'You have completed this job: ' . $job->title);
    }

}
