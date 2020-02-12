<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('patient_create');
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
                'string'
            ],
            'age_years' => [
                'integer',
            ],
            'age_months' => [
                'nullable',
                'integer',
            ],
            'date_of_birth' => [
                'nullable',
                'date',
            ],
            'gender' => [
                'string',
            ],
            'ethnicity' => [
                'nullable',
                'string',
            ],
            'occupation' => [
                'nullable',
                'string',
            ],
            'address' => [
                'string',
            ],
            'district' => [
                'string',
            ],
            'MOH_area' => [
                'string',
            ],
            'GN_area' => [
                'nullable',
                'string',
            ],

        ];
    }
}
