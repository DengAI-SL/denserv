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
                {{--<tr>--}}
                    {{--<th>--}}
                        {{--{{ trans('global.patient.fields.DPDHS_area') }}--}}
                    {{--</th>--}}
                    {{--<td>{{$patient->DPDHS_area ?? ''}}</td>--}}
                {{--</tr>--}}
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
                </tbody>
            </table>
        </div>
    </div>

@endsection
