<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    use SoftDeletes;

    protected $dates = [
        'notification_at',              // Date of notification
        'date_of_birth',
        'updated_at',
        'created_at',
        'deleted_at',
        'report_form_filled_at',
    ];

    protected $fillable = [

        'hospital',
        'bht_no',
        'notification_at',              // Date of notification
        'case_no',
        'name',
        'age_years',
        'age_months',
        'date_of_birth',
        'gender',
        'ethnicity',
        'occupation',
        'address',
        'DPDHS_area',
        'MOH_area',
        'GN_area',
        'created_at',
        'updated_at',
        'deleted_at',
        'report_form_filled_at',
    ];

    public function getReportFormFilledAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setReportFormFilledAtAttribute($value)
    {
        $this->attributes['report_form_filled_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat('Y/m/d', $value)->format('Y-m-d H:i:s') : null;
    }

    public function getNotificationAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setNotificationAtAttribute($value)
    {

        $this->attributes['notification_at'] = $value ? Carbon::createFromFormat('Y/m/d', $value)->format('Y-m-d H:i:s') : null;
    }
}
