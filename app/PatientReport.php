<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PatientReport extends Model
{
    //
    use SoftDeletes;

    protected $dates = [

        'updated_at',
        'created_at',
        'deleted_at',
        'date_of_admission',
        'date_of_onset',
        'date_of_first_FBC',
        'date_of_outcome',

    ];

    protected $fillable = [
        'mode_of_admission',
        'transferred_from',
        'date_of_admission',
        "date_of_onset",
        'diagnosed_by',
        "etiology_by",
        'date_of_first_FBC',
        'first_FBC_count',
        "diagnosis",
        "dhf_complication",
        "eds_complication",
        'outcome',
        'date_of_outcome',
        'if_transferred_hospital',
    ];

    public function getDateOfAdmissionAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateOfAdmissionAttribute($value)
    {
        $this->attributes['date_of_admission'] = $value ? Carbon::createFromFormat('Y/m/d', $value)->format('Y-m-d H:i:s') : null;

    }
    public function getDateOfOnsetAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
//        return $value;
    }

    public function setDateOfOnsetAttribute($value)
    {
        $this->attributes['date_of_onset'] = $value ? Carbon::createFromFormat('Y/m/d', $value)->format('Y-m-d H:i:s') : null;
    }
    public function getDateOfFirstFBCAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateOfFirstFBCAttribute($value)
    {
        $this->attributes['date_of_first_FBC'] = $value ? Carbon::createFromFormat('Y/m/d', $value)->format('Y-m-d H:i:s') : null;
    }
    public function getDateOfOutcomeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
//        return $value;
    }

    public function setDateOfOutcomeAttribute($value)
    {
        $this->attributes['date_of_outcome'] = $value ? Carbon::createFromFormat('Y/m/d', $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDiagnosisAttribute($value){

        return array_diff(explode(";",$value),[""]);
    }

    public function setDiagnosisAttribute($value){
        $diagnosis_str="";
        foreach ($value as $diagnosis){
            $diagnosis_str .= $diagnosis.";";
        }

        $this->attributes['diagnosis'] = $diagnosis_str;
    }
    public function getDhfComplicationAttribute($value){

        return array_diff(explode(";",$value),[""]);
    }

    public function setDhfComplicationAttribute($value){
        $dhf_complication_str = "";
        foreach ($value as $complication){
            $dhf_complication_str .= $complication.";";
        }
        $this->attributes['dhf_complication'] =$dhf_complication_str;
    }
    public function getEtiologyByAttribute($value){

        return array_diff(explode(";",$value),[""]);
    }

    public function setEtiologyByAttribute($value){
        $etiology_by_str = "";
        foreach ($value as $etiology){
            $etiology_by_str .= $etiology.";";
        }
        $this->attributes['etiology_by'] =$etiology_by_str;
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }
}
