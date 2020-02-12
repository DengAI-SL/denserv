@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('global.patient.title') }}
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.hospital') }}
                    </th>
                    <td>{{$patient->hospital ?? ''}}</td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.bht_no') }}
                    </th>
                    <td>{{$patient->bht_no ?? ''}}</td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.notification_at') }}
                    </th>
                    <td>{{$patient->notification_at ?? ''}}</td>
                </tr>
                {{--<tr>--}}
                    {{--<th>--}}
                        {{--{{ trans('global.patient.fields.case_no') }}--}}
                    {{--</th>--}}
                    {{--<td>{{$patient->case_no ?? ''}}</td>--}}
                {{--</tr>--}}
                <tr>
                    <th>
                        {{ trans('global.patient.fields.name') }}
                    </th>
                    <td>{{$patient->name ?? ''}}</td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.age') }}
                    </th>
                    <td>{{$patient->age ?? ''}}</td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.date_of_birth') }}
                    </th>
                    <td>{{$patient->date_of_birth ?? ''}}</td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.gender') }}
                    </th>
                    <td>{{$patient->gender ?? ''}}</td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.ethnicity') }}
                    </th>
                    <td>{{$patient->ethnicity ?? ''}}</td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.occupation') }}
                    </th>
                    <td>{{$patient->occupation ?? ''}}</td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.address') }}
                    </th>
                    <td>{{$patient->address ?? ''}}</td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.district') }}
                    </th>
                    <td>{{$patient->district ?? ''}}</td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.MOH_area') }}
                    </th>
                    <td>{{$patient->MOH_area ?? ''}}</td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.GN_area') }}
                    </th>
                    <td>{{$patient->GN_area ?? ''}}</td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.report_form_filled_at') }}
                    </th>
                    <td>{{$patient->report_form_filled_at ?? ''}}</td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.created_at') }}
                    </th>
                    <td>{{$patient->created_at ?? ''}}</td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.updated_at') }}
                    </th>
                    <td>{{$patient->updated_at ?? ''}}</td>
                </tr>
                @isset($patient->patientReport)

                    <tr>
                        <th>
                            {{ trans('global.patient_report.fields.mode_of_admission') }}
                        </th>
                        <td>
                            {{$patient->patientReport->mode_of_admission}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.patient_report.fields.transferred_from') }}
                        </th>

                        <td>
                            {{$patient->patientReport->transferred_from}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.patient_report.fields.date_of_admission') }}
                        </th>

                        <td>
                            {{$patient->patientReport->date_of_admission}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.patient_report.fields.date_of_onset') }}
                        </th>
                        <td>
                            {{$patient->patientReport->date_of_onset}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.patient_report.fields.diagnosed_by') }}
                        </th>
                        <td>
                            {{$patient->patientReport->diagnosed_by}}
                        </td>

                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.patient_report.fields.etiology_by') }}
                        </th>
                        <td>
                            @foreach($patient->patientReport->etiology_by as $item)
                                <span class="badge badge-info">{{ $item }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.patient_report.fields.date_of_first_FBC') }}
                        </th>
                        <td>
                            {{$patient->patientReport->date_of_first_FBC}}
                        </td>

                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.patient_report.fields.diagnosis') }}
                        </th>
                        <td>
                            @foreach($patient->patientReport->diagnosis as $item)
                                <span class="badge badge-primary">{{ $item }}</span>
                            @endforeach
                        </td>

                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.patient_report.fields.dhf_complication') }}
                        </th>
                        <td>
                            @foreach($patient->patientReport->dhf_complication as $item)
                                <span class="badge badge-danger">{{ $item }}</span>
                            @endforeach
                        </td>

                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.patient_report.fields.outcome') }}
                        </th>

                        <td>
                            {{$patient->patientReport->outcome}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.patient_report.fields.date_of_outcome') }}
                        </th>

                        <td>
                            {{$patient->patientReport->date_of_outcome}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.patient_report.fields.if_transferred_hospital') }}
                        </th>

                        <td>
                            {{$patient->patientReport->if_transferred_hospital}}
                        </td>
                    </tr>
                    @endisset
                </tbody>
            </table>
        </div>
    </div>

@endsection
