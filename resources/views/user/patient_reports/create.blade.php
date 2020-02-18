@extends('layouts.admin')
@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Patient Report Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Patient Management</a></li>
                    <li class="breadcrumb-item active">Create Patient Report Form</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('global.patient_report.title_singular') }}
            <em>{{ trans('global.patient.title_singular') }} : <b>{{$patient->name}}</b> </em>
        </div>

        <div class="card-body">
            <form action="{{ route("user.patient_reports.store",[$patient->id]) }}" method="POST"
                  enctype="multipart/form-data"
                  class="{{ $errors->isEmpty() ? 'needs-validation' : 'was-validated' }}"
                  novalidate>
                @csrf

                <div class="d-flex flex-row">
                    <div class="col-sm-4">
                        <!-- radio -->
                        <div class="form-group clearfix" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.patient.fields.mode_of_admission_helper') }}">
                            <div class="row">
                                <label
                                    for="mode_of_admission">{{ trans('global.patient_report.fields.mode_of_admission') }} </label>
                            </div>
                            <div class="form-control {{ $errors->has('mode_of_admission') ? 'is-invalid' : '' }}">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="direct_opd" value="direct_opd"
                                           name="mode_of_admission" @isset($patient_report)
                                           @if($patient_report->mode_of_admission=='direct_opd')
                                           checked
                                           @endif
                                           @endisset
                                           @empty($patient_report)
                                           @if(old('mode_of_admission')=='direct_opd')
                                           checked
                                        @endif
                                        @endempty>
                                    <label for="direct_opd">
                                        1. {{ trans('global.patient_report.fields.mode_of_admission_val.direct_opd') }}
                                    </label>
                                </div>
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="transferred" value="transferred"
                                           name="mode_of_admission" @isset($patient_report)
                                           @if($patient_report->mode_of_admission=='transferred')
                                           checked
                                           @endif
                                           @endisset
                                           @empty($patient_report)
                                           @if(old('mode_of_admission')=='transferred')
                                           checked
                                        @endif
                                        @endempty>
                                    <label for="transferred">
                                        2. {{ trans('global.patient_report.fields.mode_of_admission_val.transferred') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        @if($errors->has('mode_of_admission'))
                            <div class="invalid-feedback">
                                {{ $errors->first('mode_of_admission') }}
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                {{ trans('global.patient_report.fields.mode_of_admission_error') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-5">
                        <div class="form-group" data-toggle="tooltip"
                             data-placement="top" data-html="true"
                             title="{{ trans('global.patient_report.fields.transferred_from_helper') }}">
                            <label
                                for="transferred_from">{{ trans('global.patient_report.fields.transferred_from') }}</label>
                            <input type="text" id="transferred_from" name="transferred_from"
                                   class="form-control {{ $errors->has('transferred_from') ? 'is-invalid' : '' }}"
                                   value="{{ old('transferred_from', isset($patient_report) ? $patient_report->transferred_from : '') }}"
                                   disabled="disabled">
                            @if($errors->has('transferred_from'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('transferred_from') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient_report.fields.transferred_from_error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date_of_admission">{{ trans('global.patient_report.fields.date_of_admission') }}
                                *</label>
                            <input type="text" id="date_of_admission" name="date_of_admission"
                                   class="form-control {{ $errors->has('date_of_admission') ? 'is-invalid' : '' }}"
                                   value="{{ old('date_of_admission', isset($patient_report) ? $patient_report->date_of_admission : '') }}"
                                   data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                   data-toggle="tooltip" data-placement="top" data-html="true"
                                   title="{{ trans('global.patient_report.fields.date_of_admission_helper') }}"
                                   data-mask required>
                            @if($errors->has('date_of_admission'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_of_admission') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient_report.fields.date_of_admission_error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date_of_onset">{{ trans('global.patient_report.fields.date_of_onset') }}
                                *</label>
                            <input type="text" id="date_of_onset" name="date_of_onset"
                                   class="form-control {{ $errors->has('date_of_onset') ? 'is-invalid' : '' }}"
                                   value="{{ old('date_of_onset', isset($patient_report) ? $patient_report->date_of_onset : '') }}"
                                   data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                   data-toggle="tooltip" data-placement="top" data-html="true"
                                   title="{{ trans('global.patient_report.fields.date_of_onset_helper') }}" data-mask
                                   required>
                            @if($errors->has('date_of_onset'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_of_onset') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient_report.fields.date_of_onset_error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- radio -->
                        <div class="form-group clearfix" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.patient.fields.diagnosed_by_helper') }}">
                            <div class="row">
                                <label
                                    for="diagnosed_by">{{ trans('global.patient_report.fields.diagnosed_by') }}
                                    *</label>
                            </div>
                            <div class="form-control {{ $errors->has('diagnosed_by') ? 'is-invalid' : '' }}">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="clinical" value="clinical"
                                           name="diagnosed_by" @isset($patient_report)
                                           @if(strpos($patient_report->diagnosed_by,'clinical')!==false)
                                           checked
                                           @endif
                                           @endisset
                                           @empty($patient_report)
                                           @if(strpos(old('diagnosed_by'),'clinical')!==false)
                                           checked
                                           @endif
                                           @endempty required>
                                    <label for="clinical">
                                        1. {{ trans('global.patient_report.fields.diagnosed_by_val.clinical') }}
                                    </label>
                                </div>
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="test" value="test"
                                           name="diagnosed_by" @isset($patient_report)
                                           @if(strpos($patient_report->diagnosed_by,'test')!==false)
                                           checked
                                           @endif
                                           @endisset
                                           @empty($patient_report)
                                           @if(strpos(old('diagnosed_by'),'test')!==false)
                                           checked
                                        @endif
                                        @endempty>
                                    <label for="test">
                                        2. {{ trans('global.patient_report.fields.diagnosed_by_val.test') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        @if($errors->has('diagnosed_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('diagnosed_by') }}
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                {{ trans('global.patient_report.fields.diagnosed_by_error') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <!-- radio -->
                        <div class="form-group clearfix" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.patient.fields.etiology_by_helper') }}">
                            <div class="row">
                                <label
                                    for="etiology_by">{{ trans('global.patient_report.fields.etiology_by') }} </label>
                            </div>
                            <div class="form-control {{ $errors->has('etiology_by') ? 'is-invalid' : '' }}">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="etiology_by_1"
                                           value="{{trans('global.patient_report.fields.etiology_by_val.etiology_by_1')}}"
                                           name="etiology_by[]" @isset($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.etiology_by_val.etiology_by_1'),$patient_report->etiology_by)!==false)
                                           checked
                                           @endif
                                           @endisset
                                           @empty($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.etiology_by_val.etiology_by_1'),old('etiology_by',[]))!==false)
                                           checked
                                        @endif
                                        @endempty>
                                    <label for="etiology_by_1">
                                        1. {{trans('global.patient_report.fields.etiology_by_val.etiology_by_1')}}
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="etiology_by_2"
                                           value="{{trans('global.patient_report.fields.etiology_by_val.etiology_by_2')}}"
                                           name="etiology_by[]" @isset($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.etiology_by_val.etiology_by_2'),$patient_report->etiology_by)!==false)
                                           checked
                                           @endif
                                           @endisset
                                           @empty($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.etiology_by_val.etiology_by_2'),old('etiology_by',[]))!==false)
                                           checked
                                        @endif
                                        @endempty>
                                    <label for="etiology_by_2">
                                        2. {{trans('global.patient_report.fields.etiology_by_val.etiology_by_2')}}
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="etiology_by_3"
                                           value="{{trans('global.patient_report.fields.etiology_by_val.etiology_by_3')}}"
                                           name="etiology_by[]" @isset($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.etiology_by_val.etiology_by_3'),$patient_report->etiology_by)!==false)
                                           checked
                                           @endif
                                           @endisset
                                           @empty($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.etiology_by_val.etiology_by_3'),old('etiology_by',[]))!==false)
                                           checked
                                        @endif
                                        @endempty>
                                    <label for="etiology_by_3">
                                        3. {{trans('global.patient_report.fields.etiology_by_val.etiology_by_3')}}
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="etiology_by_4"
                                           value="{{trans('global.patient_report.fields.etiology_by_val.etiology_by_3')}}"
                                           name="etiology_by[]" @isset($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.etiology_by_val.etiology_by_4'),$patient_report->etiology_by)!==false)
                                           checked
                                           @endif
                                           @endisset
                                           @empty($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.etiology_by_val.etiology_by_4'),old('etiology_by',[]))!==false)
                                           checked
                                        @endif
                                        @endempty>
                                    <label for="etiology_by_4">
                                        3. {{trans('global.patient_report.fields.etiology_by_val.etiology_by_4')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                        @if($errors->has('etiology_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('etiology_by') }}
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                {{ trans('global.patient_report.fields.etiology_by_error') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date_of_first_FBC">{{ trans('global.patient_report.fields.date_of_first_FBC') }}
                                *</label>
                            <input type="text" id="date_of_first_FBC" name="date_of_first_FBC"
                                   class="form-control {{ $errors->has('date_of_first_FBC') ? 'is-invalid' : '' }}"
                                   value="{{ old('date_of_first_FBC', isset($patient_report) ? $patient_report->date_of_first_FBC : '') }}"
                                   data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                   data-toggle="tooltip" data-placement="top" data-html="true"
                                   title="{{ trans('global.patient_report.fields.date_of_first_FBC_helper') }}"
                                   data-mask required>
                            @if($errors->has('date_of_first_FBC'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_of_first_FBC') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient_report.fields.date_of_first_FBC_error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-2">

                        <div class="form-group" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.patient_report.fields.first_FBC_count_helper') }}">
                            <label for="first_FBC_count">{{ trans('global.patient_report.fields.first_FBC_count') }}
                                *</label>
                            <input type="number" id="first_FBC_count" name="first_FBC_count"
                                   class="form-control  {{ $errors->has('first_FBC_count') ? 'is-invalid' : '' }}"
                                   value="{{ old('first_FBC_count', isset($patient_report) ? $patient_report->first_FBC_count : '') }}"
                                   min="0"
                                   step="1" required>
                            @if($errors->has('first_FBC_count'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_FBC_count') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient_report.fields.first_FBC_count_error') }}
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="col-sm-7">
                        <!-- radio -->
                        <div class="form-group clearfix" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.patient.fields.diagnosis_helper') }}">
                            <div class="row">
                                <label
                                    for="diagnosis">{{ trans('global.patient_report.fields.diagnosis') }} </label>
                            </div>
                            <div class="form-control {{ $errors->has('diagnosis') ? 'is-invalid' : '' }}">
                                <div class="icheck-info d-inline">
                                    <input type="radio" id="diagnosis_1"
                                           value="{{trans('global.patient_report.fields.diagnosis_val.diagnosis_1')}}"
                                           name="diagnosis[]" @isset($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.diagnosis_val.diagnosis_1'),$patient_report->diagnosis)!==false)
                                           checked
                                           @endif
                                           @endisset
                                           @empty($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.diagnosis_val.diagnosis_1'),old('diagnosis',[]))!==false)
                                           checked
                                        @endif
                                        @endempty>
                                    <label for="diagnosis_1">
                                        1. {{trans('global.patient_report.fields.diagnosis_val.diagnosis_1')}}
                                    </label>
                                </div>
                                <div class="icheck-warning d-inline">
                                    <input type="radio" id="diagnosis_2"
                                           value="{{trans('global.patient_report.fields.diagnosis_val.diagnosis_2')}}"
                                           name="diagnosis[]" @isset($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.diagnosis_val.diagnosis_2'),$patient_report->diagnosis)!==false)
                                           checked
                                           @endif
                                           @endisset
                                           @empty($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.diagnosis_val.diagnosis_2'),old('diagnosis',[]))!==false)
                                           checked
                                        @endif
                                        @endempty>
                                    <label for="diagnosis_2">
                                        2. {{trans('global.patient_report.fields.diagnosis_val.diagnosis_2')}}
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="diagnosis_3"
                                           value="{{trans('global.patient_report.fields.diagnosis_val.diagnosis_3')}}"
                                           name="diagnosis[]" @isset($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.diagnosis_val.diagnosis_3'),$patient_report->diagnosis)!==false)
                                           checked
                                           @endif
                                           @endisset
                                           @empty($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.diagnosis_val.diagnosis_3'),old('diagnosis',[]))!==false)
                                           checked
                                        @endif
                                        @endempty>
                                    <label for="diagnosis_3">
                                        3. {{trans('global.patient_report.fields.diagnosis_val.diagnosis_3')}}
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="diagnosis_4"
                                           value="{{trans('global.patient_report.fields.diagnosis_val.diagnosis_4')}}"
                                           name="diagnosis[]" @isset($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.diagnosis_val.diagnosis_4'),$patient_report->diagnosis)!==false)
                                           checked
                                           @endif
                                           @endisset
                                           @empty($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.diagnosis_val.diagnosis_4'),old('diagnosis',[]))!==false)
                                           checked
                                        @endif
                                        @endempty>
                                    <label for="diagnosis_4">
                                        3. {{trans('global.patient_report.fields.diagnosis_val.diagnosis_4')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                        @if($errors->has('diagnosis'))
                            <div class="invalid-feedback">
                                {{ $errors->first('diagnosis') }}
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                {{ trans('global.patient_report.fields.diagnosis_error') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-6" id="dhf_complication_form">
                        <!-- radio -->
                        <div class="form-group clearfix" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.patient.fields.dhf_complication_helper') }}">
                            <div class="row">
                                <label
                                    for="dhf_complication">{{ trans('global.patient_report.fields.dhf_complication') }} </label>
                            </div>
                            <div class="form-control {{ $errors->has('dhf_complication') ? 'is-invalid' : '' }}">
                                <div class="icheck-info d-inline">
                                    <input type="checkbox" id="dhf_complication_1"
                                           value="{{trans('global.patient_report.fields.dhf_complication_val.dhf_complication_1')}}"
                                           name="dhf_complication[]"
                                           {{--disabled="true"--}}
                                           @isset($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.dhf_complication_val.dhf_complication_1'),$patient_report->dhf_complication)!==false)
                                           checked
                                           @endif
                                           @endisset
                                           @empty($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.dhf_complication_val.dhf_complication_1'),old('dhf_complication',[]))!==false)
                                           checked
                                        @endif
                                        @endempty>
                                    <label for="dhf_complication_1">
                                        1. {{trans('global.patient_report.fields.dhf_complication_val.dhf_complication_1')}}
                                    </label>
                                </div>
                                <div class="icheck-warning d-inline">
                                    <input type="checkbox" id="dhf_complication_2"
                                           value="{{trans('global.patient_report.fields.dhf_complication_val.dhf_complication_2')}}"
                                           name="dhf_complication[]"
                                           {{--disabled="true"--}}
                                           @isset($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.dhf_complication_val.dhf_complication_2'),$patient_report->dhf_complication)!==false)
                                           checked
                                           @endif
                                           @endisset
                                           @empty($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.dhf_complication_val.dhf_complication_2'),old('dhf_complication',[]))!==false)
                                           checked
                                        @endif
                                        @endempty>
                                    <label for="dhf_complication_2">
                                        2. {{trans('global.patient_report.fields.dhf_complication_val.dhf_complication_2')}}
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="dhf_complication_3"
                                           value="{{trans('global.patient_report.fields.dhf_complication_val.dhf_complication_3')}}"
                                           name="dhf_complication[]"
                                           {{--disabled="true"--}}
                                           @isset($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.dhf_complication_val.dhf_complication_3'),$patient_report->dhf_complication)!==false)
                                           checked
                                           @endif
                                           @endisset
                                           @empty($patient_report)
                                           @if(in_array(trans('global.patient_report.fields.dhf_complication_val.dhf_complication_3'),old('dhf_complication',[]))!==false)
                                           checked
                                        @endif
                                        @endempty>
                                    <label for="dhf_complication_3">
                                        3. {{trans('global.patient_report.fields.dhf_complication_val.dhf_complication_3')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                        @if($errors->has('dhf_complication'))
                            <div class="invalid-feedback">
                                {{ $errors->first('dhf_complication') }}
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                {{ trans('global.patient_report.fields.dhf_complication_error') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6" id="eds_complication_form">
                        <div class="form-group" data-toggle="tooltip"
                             data-placement="top" data-html="true"
                             title="{{ trans('global.patient_report.fields.eds_complication_helper') }}">
                            <label
                                for="eds_complication">{{ trans('global.patient_report.fields.eds_complication') }}</label>
                            <input type="text" id="eds_complication" name="eds_complication"
                                   class="form-control {{ $errors->has('eds_complication') ? 'is-invalid' : '' }}"
                                   value="{{ old('eds_complication', isset($patient_report) ? $patient_report->eds_complication : '') }}">
                            @if($errors->has('eds_complication'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('eds_complication') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient_report.fields.eds_complication_error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="col-sm-7">
                        <!-- radio -->
                        <div class="form-group clearfix" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.patient.fields.outcome_helper') }}">
                            <div class="row">
                                <label
                                    for="outcome">{{ trans('global.patient_report.fields.outcome') }}* </label>
                            </div>
                            <div class="form-control {{ $errors->has('outcome') ? 'is-invalid' : '' }}">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="outcome_1"
                                           value="{{trans('global.patient_report.fields.outcome_val.outcome_1')}}"
                                           name="outcome"
                                           @isset($patient_report)
                                           @if(trans('global.patient_report.fields.outcome_val.outcome_1')===$patient_report->outcome)
                                           checked
                                           @endif
                                           @endisset
                                           @empty($patient_report)
                                           @if(trans('global.patient_report.fields.outcome_val.outcome_1')===old('outcome',''))
                                           checked
                                           @endif
                                           @endempty required>
                                    <label for="outcome_1">
                                        1. {{trans('global.patient_report.fields.outcome_val.outcome_1')}}
                                    </label>
                                </div>
                                <div class="icheck-warning d-inline">
                                    <input type="radio" id="outcome_2"
                                           value="{{trans('global.patient_report.fields.outcome_val.outcome_2')}}"
                                           name="outcome"
                                           @isset($patient_report)
                                           @if(trans('global.patient_report.fields.outcome_val.outcome_2')===$patient_report->outcome)
                                           checked
                                           @endif
                                           @endisset
                                           @empty($patient_report)
                                           @if(trans('global.patient_report.fields.outcome_val.outcome_2')===old('outcome',''))
                                           checked
                                        @endif
                                        @endempty>
                                    <label for="outcome_2">
                                        2. {{trans('global.patient_report.fields.outcome_val.outcome_2')}}
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="outcome_3"
                                           value="{{trans('global.patient_report.fields.outcome_val.outcome_3')}}"
                                           name="outcome"
                                           @isset($patient_report)
                                           @if(trans('global.patient_report.fields.outcome_val.outcome_3')===$patient_report->outcome)
                                           checked
                                           @endif
                                           @endisset
                                           @empty($patient_report)
                                           @if(trans('global.patient_report.fields.outcome_val.outcome_3')===old('outcome',''))
                                           checked
                                        @endif
                                        @endempty>
                                    <label for="outcome_3">
                                        3. {{trans('global.patient_report.fields.outcome_val.outcome_3')}}
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="outcome_4"
                                           value="{{trans('global.patient_report.fields.outcome_val.outcome_4')}}"
                                           name="outcome"
                                           @isset($patient_report)
                                           @if(trans('global.patient_report.fields.outcome_val.outcome_4')===$patient_report->outcome)
                                           checked
                                           @endif
                                           @endisset
                                           @empty($patient_report)
                                           @if(trans('global.patient_report.fields.outcome_val.outcome_4')===old('outcome',''))
                                           checked
                                        @endif
                                        @endempty>
                                    <label for="outcome_4">
                                        4. {{trans('global.patient_report.fields.outcome_val.outcome_4')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                        @if($errors->has('outcome'))
                            <div class="invalid-feedback">
                                {{ $errors->first('outcome') }}
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                {{ trans('global.patient_report.fields.outcome_error') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.patient_report.fields.if_transferred_hospital_helper') }}">
                            <label
                                for="if_transferred_hospital">{{ trans('global.patient_report.fields.if_transferred_hospital') }}</label>
                            <select id="if_transferred_hospital" name="if_transferred_hospital"
                                    class="form-control select2  {{ $errors->has('if_transferred_hospital') ? 'is-invalid' : '' }}"
                                    style="width: 100%;" {{old('if_transferred_hospital',isset($patient_report)?$patient_report->if_transferred_hospital:'')==''?'disabled':''}}>
                                <option></option>
                                @isset($patient_report)
                                    <option selected="selected"> {{$patient_report->if_transferred_hospital}}</option>
                                @endisset
                                @empty($patient_report)
                                    @if(old('if_transferred_hospital','')!=='')
                                        <option selected="selected"> {{old('if_transferred_hospital')}}</option>
                                    @endif
                                @endempty
                                @foreach($hospitals as $hospital)
                                    <option> {{$hospital->hospital_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('if_transferred_hospital'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('if_transferred_hospital') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient_report.fields.if_transferred_hospital_error') }} is
                                    required
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="date_of_outcome">{{ trans('global.patient_report.fields.date_of_outcome') }}
                                *</label>
                            <input type="text" id="date_of_outcome" name="date_of_outcome"
                                   class="form-control {{ $errors->has('date_of_outcome') ? 'is-invalid' : '' }}"
                                   value="{{ old('date_of_outcome', isset($patient_report) ? $patient_report->date_of_outcome : '') }}"
                                   data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                   data-toggle="tooltip" data-placement="top" data-html="true"
                                   title="{{ trans('global.patient_report.fields.date_of_outcome_helper') }}" data-mask
                                   required>
                            @if($errors->has('date_of_outcome'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_of_outcome') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient_report.fields.date_of_outcome_error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
@endsection

@section('scripts')
    <!-- InputMask -->
    <script src="/plugins/moment/moment.min.js"></script>
    <script src="/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script type="text/javascript">
        //Datemask dd/mm/yyyy
        // $('#notification_at').inputmask('yyyy/mm/dd', {'placeholder': 'yyyy/mm/dd'});
        $('#date_of_admission').datetimepicker({
            format: 'YYYY/MM/DD'
        });
        // $('#date_of_admission').inputmask('yyyy/mm/dd', {'placeholder': 'yyyy/mm/dd'});
        $('#date_of_onset').datetimepicker({
            format: 'YYYY/MM/DD'
        });
        $('#date_of_first_FBC').datetimepicker({
            format: 'YYYY/MM/DD'
        });
        $('#date_of_outcome').datetimepicker({
            format: 'YYYY/MM/DD'
        });
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script type="text/javascript">
        function show_dhf_complication_form() {
            $('#eds_complication_form').hide();
            $('#eds_complication').removeAttr('required');
            $('#dhf_complication_form').show();
            $('#dhf_complication_1').prop("required",true);


            console.log("Showing dhf");
        }

        function show_eds_complication_form() {
            $('#dhf_complication_form').hide();
            $('#dhf_complication_1').removeAttr('required');
            $('#eds_complication_form').show();
            $('#eds_complication').prop("required",true);

            console.log("showing eds");

        }

        function hide_both_eds_dhf() {

            $('#dhf_complication_form').hide()
            $('#eds_complication_form').hide()
            console.log("hiding both eds dhf");
        }

        $(document).ready(function () {

            $('#transferred').click(function (e) {
                $('#transferred_from').val("{{ old('transferred_from', isset($patient_report) ? $patient_report->transferred_from : '') }}");
                $('#transferred_from').prop("disabled", false);
            });
            $('#direct_opd').click(function (e) {

                $('#transferred_from').val('');
                $('#transferred_from').prop("disabled", true)
            });

            var mode_of_admission = "{{ old('mode_of_admission', isset($patient_report) ? $patient_report->mode_of_admission : '') }}"
            if (mode_of_admission !== "transferred") {
                $('#transferred_from').val('');
                $('#transferred_from').prop("disabled", true)
            }
            else if (mode_of_admission === "transferred") {
                $('#transferred_from').prop("disabled", false);
            }
            @if(in_array(trans('global.patient_report.fields.diagnosis_val.diagnosis_3'),old('diagnosis', isset($patient_report) ? $patient_report->diagnosis : [])) !==false)
                show_dhf_complication_form()
            @elseif(in_array(trans('global.patient_report.fields.diagnosis_val.diagnosis_4'),old('diagnosis', isset($patient_report) ? $patient_report->diagnosis : [])) !==false)
                show_eds_complication_form();
            @else
            hide_both_eds_dhf();
            @endif

            $("input[name='diagnosis[]']").click(function () {

                var radioValue = $(this).val();
                var complicated_dhf = "{{trans('global.patient_report.fields.diagnosis_val.diagnosis_3')}}";
                var complicated_eds = "{{trans('global.patient_report.fields.diagnosis_val.diagnosis_4')}}";

                if (radioValue === complicated_dhf) {
                    show_dhf_complication_form();
                    console.log(radioValue);
                } else if (radioValue === complicated_eds) {
                    show_eds_complication_form()
                }
                else {
                    hide_both_eds_dhf();
                }

            });

            $('#outcome_2').click(function (e) {
                console.log("asdfasd");
                {{--                $('#if_transferred_hospital').val("{{ old('transferred_from', isset($patient_report) ? $patient_report->transferred_from : '') }}");--}}
                $('#if_transferred_hospital').prop("disabled", false);
            });
            $('#outcome_1').click(function (e) {
                {{--                $('#if_transferred_hospital').val("{{ old('transferred_from', isset($patient_report) ? $patient_report->transferred_from : '') }}");--}}
                $('#if_transferred_hospital').prop("disabled", true);
                $('#if_transferred_hospital').val(null).trigger('change');
            });
            $('#outcome_3').click(function (e) {
                {{--                $('#if_transferred_hospital').val("{{ old('transferred_from', isset($patient_report) ? $patient_report->transferred_from : '') }}");--}}
                $('#if_transferred_hospital').prop("disabled", true);
                $('#if_transferred_hospital').val(null).trigger('change');
            });
            $('#outcome_4').click(function (e) {
                {{--                $('#if_transferred_hospital').val("{{ old('transferred_from', isset($patient_report) ? $patient_report->transferred_from : '') }}");--}}
                $('#if_transferred_hospital').prop("disabled", true);
                $('#if_transferred_hospital').val(null).trigger('change');
            });
            $('#if_transferred_hospital').select2({
                placeholder: "{{trans('global.patient_report.fields.if_transferred_hospital_placeholder')}}"
            });
        });

        $('#date_of_admission').change(function (e) {

            var date_of_admission = $(this).val();
            $('#date_of_onset').data('DateTimePicker').defaultDate(date_of_admission);
            $('#date_of_first_FBC').data('DateTimePicker').defaultDate(date_of_admission);
            $('#date_of_outcome').data('DateTimePicker').defaultDate(date_of_admission);

        });

    </script>
@endsection
