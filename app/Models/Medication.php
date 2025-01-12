<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    //
    // Mutator to ensure 'time_of_day' is stored as a JSON array
    public function setTimeOfDayAttribute($value)
    {
        // If the value is already an array, no need to process it
        if (is_array($value)) {
            $this->attributes['time_of_day'] = json_encode($value);
        } else {
            // If it's not an array, convert the value to an array
            $this->attributes['time_of_day'] = json_encode(json_decode($value, true));
        }
    }

    // Accessor to retrieve 'time_of_day' as an array
    public function getTimeOfDayAttribute($value)
    {
        // Decode JSON when retrieving it
        return json_decode($value, true);
    }
}
