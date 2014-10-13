<?php
use Carbon\Carbon;

class BaseModel extends Eloquent {

    public function getCreatedAtAttribute($attr) {        
        return Carbon::parse($attr)->format('d F Y - h:i a'); //Change the format to whichever you desire
    }
}