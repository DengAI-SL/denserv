<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('patient_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hospital' => [
                'required',
            ],
            'bht_no' => [
                'required',
            ],
            'notification_at' => [
                'date',
            ],
//            'case_no'    => [
//                'string',
//            ],
            'name' => [
                'required',
            ],
            'age_years' => [
                'integer',
            ],
            'age_months' => [
                'integer',
            ],
            'date_of_birth' => [
                'date',
            ],
            'gender' => [
                'string',
            ],
            'ethnicity' => [
                'string',
            ],
            'occupation' => [
                'string',
            ],
            'address' => [
                'string',
            ],
//            'DPDHS_area' => [
//                'string',
//            ],
            'MOH_area' => [
                'string',
            ],
            'GN_area' => [
                'string',
            ],
        ];
    }
}
