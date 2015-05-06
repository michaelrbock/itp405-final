<?php namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Validator;

class Blogger extends Model {

    protected $fillable = ['name', 'website'];

    public static function validate($input)
    {
        return $validation = Validator::make($input, [
            'name' => 'required',
            'website' => 'required|active_url|url'
        ]);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
