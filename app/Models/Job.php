<?php namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Validator;

class Job extends Model {

    public static function validate($input)
    {
        return $validation = Validator::make($input, [
            'title' => 'required',
            'content_url' => 'required|active_url|url',
            'creator_id' => 'required|integer'
        ]);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}