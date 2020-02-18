<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('patient_report_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'mode_of_admission'     =>[
                'string',
                'required',
            ],
            'transferred_from'      =>[
                'required_if:mode_of_admission,transferred',
            ],
            'date_of_admission'     =>[
                'required',
                'date',
            ],
            'date_of_onset'     =>[
                'required',
                'date',
            ],
            'diagnosed_by'     =>[
                'required',
            ],
            'etiology_by'     =>[
                'required',
                'array'
            ],
            'date_of_first_FBC'     =>[
                'nullable',
                'date',
            ],
            'diagnosis'     =>[
                'required',
                'array',
            ],
            'dhf_complication'     =>[
                'required_if:diagnosis,'.trans('global.patient_report.fields.diagnosis_val.diagnosis_3'),
                'array',
            ],
            'eds_complication'     =>[
                'required_if:diagnosis,'.trans('global.patient_report.fields.diagnosis_val.diagnosis_4'),
            ],
            'outcome'     =>[
                'required',
            ],
            'date_of_outcome'     =>[
                'required',
                'date',
            ],
            'if_transferred_hospital'     =>[
                'required_if:outcome,'.trans('global.patient_report.fields.outcome_val.outcome_2'),
            ],
        ];
    }
}
