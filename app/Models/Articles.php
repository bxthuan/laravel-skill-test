<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Articles extends Model
{
    protected $fillable = [
        'author', 'name', 'created_at'
    ];


    public function MyUpdate() {

        //$rs = DB::connection()->select('Select * from car_booking.booking');
        //var_dump($rs);

        DB::beginTransaction();


        /*
        DB::transaction(function() {
            $article = Articles::create(array(
                ''
            ));
        });
        */
    }
}
