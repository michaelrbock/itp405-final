<?php namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Validator;

class Job extends Model {

    public static function validate($input)
    {
        return $validation = Validator::make($input, [
            'title' => 'required',
            'content_url' => 'required|url',
            'description' => 'required',
            'budget' => 'required|integer|min:1',
            'advertiser_id' => 'required|integer'
        ]);
    }

    public function advertiser()
    {
        return $this->belongsTo('App\Models\Advertiser');
    }

    public function blogger()
    {
        return $this->belongsTo('App\Models\Blogger');
    }

}