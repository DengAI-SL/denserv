<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationsMap extends Model
{
    //
    protected $fillable = [
        "privince_name",
        "district_name",
        "dsd_name",
        "gnd_no",
        "gnd_name",
        "mc_uc_ps_name",
        "moh_name",
        "rdhs_name",
        "created_at",
        "updated_at",
        ];
}
