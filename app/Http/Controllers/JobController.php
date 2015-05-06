<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Job;
use App\Services\Readability;

class JobController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addJob(Request $request)
    {
        $validation = Job::validate($request->all());

        if ($validation->passes()) {
            $job = new Job();
            $job->title = $request->input('title');
            $job->content_url = $request->input('content_url');
            $job->description = $request->input('description');
            $job->budget = $request->input('budget');
            $job->advertiser_id = $request->input('advertiser_id');
            $job->save();

            return redirect('/advertiser')
                ->with('success', 'Advertisement successfuly created, Bloggers will bid on your job now');
        } else {
            return redirect('/advertiser')
                ->withInput()
                ->withErrors($validation);
        }
    }

    public function viewDetail($id)
    {
        $job = Job::find($id);

        $content = Readability::get($job->content_url);
        if ($content->date_published) {
            $date = date_create($content->date_published);
            $formatted_date = $date->format('M j, Y');
        } else {
            $formatted_date = '';
        }

        return view('detail', [
            'job' => $job,
            'content' => $content,
            'formatted_date' => $formatted_date
        ]);
    }

    public function viewBid($id)
    {
        $job = Job::with('blogger')->find($id);

        if (!$job->bid) {
            return redirect('/home');
        }

        return view('bid', [
            'job' => $job
        ]);
    }

}
