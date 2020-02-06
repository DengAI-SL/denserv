@extends('layouts.admin')
@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Patient Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Patient Management</a></li>
                    <li class="breadcrumb-item active">Create Patient Form</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('global.patient.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("user.patients.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex flex-row">
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('hospital') ? 'has-error' : '' }}">
                            <label for="hospital">{{ trans('global.patient.fields.hospital') }}*</label>
                            <select id="hospital" name="hospital" class="form-control select2" style="width: 100%;">
                                <option
                                    selected="selected">{{ old('hospital', isset($patient) ? $patient->hospital: '') }}</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                            @if($errors->has('hospital'))
                                <p class="help-block">
                                    {{ $errors->first('hospital') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.patient.fields.hospital_helper') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('bht_no') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('global.patient.fields.bht_no') }}*</label>
                            <input type="text" id="bht_no" name="bht_no" class="form-control"
                                   value="{{ old('bht_no', isset($patient) ? $patient->bht_no : '') }}">
                            @if($errors->has('bht_no'))
                                <p class="help-block">
                                    {{ $errors->first('bht_no') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.patient.fields.bht_no_helper') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('notification_at') ? 'has-error' : '' }}">
                            <label for="notification_at">{{ trans('global.patient.fields.notification_at') }}*</label>
                            <input type="text" id="notification_at" name="notification_at" class="form-control"
                                   value="{{ old('notification_at', isset($patient) ? $patient->notification_at : '') }}"
                                   data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                            @if($errors->has('notification_at'))
                                <p class="help-block">
                                    {{ $errors->first('notification_at') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.patient.fields.notification_at_helper') }}
                            </p>
                        </div>
                    </div>
                </div>
                {{--<div class="d-flex flex-row">--}}
                    {{--<div class="col-md-4">--}}
                        {{--<div class="form-group {{ $errors->has('case_no') ? 'has-error' : '' }}">--}}
                            {{--<label for="case_no">{{ trans('global.patient.fields.case_no') }}*</label>--}}
                            {{--<input type="text" id="case_no" name="case_no" class="form-control"--}}
                                   {{--value="{{ old('case_no', isset($patient) ? $patient->case_no : '') }}">--}}
                            {{--@if($errors->has('case_no'))--}}
                                {{--<p class="help-block">--}}
                                    {{--{{ $errors->first('case_no') }}--}}
                                {{--</p>--}}
                            {{--@endif--}}
                            {{--<p class="helper-block">--}}
                                {{--{{ trans('global.patient.fields.case_no_helper') }}--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="d-flex flex-row">
                    <div class="col-md-4">

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('global.patient.fields.name') }}*</label>
                            <input type="text" id="name" name="name" class="form-control"
                                   value="{{ old('name', isset($patient) ? $patient->name : '') }}">
                            @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.patient.fields.name_helper') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2">

                        <div class="form-group {{ $errors->has('age_years') ? 'has-error' : '' }}">
                            <label for="age_years">{{ trans('global.patient.fields.age_years') }}*</label>
                            <input type="number" id="age_years" name="age_years" class="form-control"
                                   value="{{ old('age_years', isset($patient) ? $patient->age_years : '') }}">
                            @if($errors->has('age_years'))
                                <p class="help-block">
                                    {{ $errors->first('age_years') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.patient.fields.age_years_helper') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2">

                        <div class="form-group {{ $errors->has('age_months') ? 'has-error' : '' }}">
                            <label for="age_months">{{ trans('global.patient.fields.age_months') }}*</label>
                            <input type="number" id="age_months" name="age_months" class="form-control"
                                   value="{{ old('age_months', isset($patient) ? $patient->age_months : '') }}">
                            @if($errors->has('age_months'))
                                <p class="help-block">
                                    {{ $errors->first('age_months') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.patient.fields.age_months_helper') }}
                            </p>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('date_of_birth') ? 'has-error' : '' }}">
                            <label for="date_of_birth">{{ trans('global.patient.fields.date_of_birth') }}*</label>
                            <input type="text" id="date_of_birth" name="date_of_birth" class="form-control"
                                   value="{{ old('date_of_birth', isset($patient) ? $patient->date_of_birth : '') }}"
                                   data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                            @if($errors->has('date_of_birth'))
                                <p class="help-block">
                                    {{ $errors->first('date_of_birth') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.patient.fields.date_of_birth_helper') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="col-sm-5">
                        <!-- radio -->
                        <div class="form-group clearfix">
                            <div class="row">
                                <label for="gender">{{ trans('global.patient.fields.gender') }} </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="male" value="male"
                                       name="gender" @isset($patient)
                                       @if($patient->gender=='male')
                                       checked
                                       @endif
                                       @endisset
                                       @empty($patient)
                                       @if(old('gender')=='male')
                                       checked
                                    @endif
                                    @endempty>
                                <label for="male"> 1. Male
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="female" value="female"
                                       name="gender" @isset($patient)
                                       @if($patient->gender=='female')
                                       checked
                                       @endif
                                       @endisset
                                       @empty($patient)
                                       @if(old('gender')=='female')
                                       checked
                                    @endif
                                    @endempty>
                                <label for="female"> 2. Female
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="unknown_gender" value="unknown_gender"
                                       name="gender" @isset($patient)
                                       @if($patient->gender=='unknown_gender')
                                       checked
                                       @endif
                                       @endisset
                                       @empty($patient)
                                       @if(old('gender')=='unknown_gender')
                                       checked
                                    @endif
                                    @endempty>
                                <label for="unknown_gender"> 3. Unknown
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <!-- radio -->
                        <div class="form-group clearfix">
                            <div class="row">
                                <label for="ethnicity">{{ trans('global.patient.fields.ethnicity') }} </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="sinhala" value="sinhala"
                                       name="ethnicity" @isset($patient)
                                       @if($patient->ethnicity=='sinhala')
                                       checked
                                       @endif
                                       @endisset
                                       @empty($patient)
                                       @if(old('ethnicity')=='sinhala')
                                       checked
                                    @endif
                                    @endempty>
                                <label for="sinhala"> 1. Sinhala
                                </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="tamil" value="tamil"
                                       name="ethnicity" @isset($patient)
                                       @if($patient->ethnicity=='tamil')
                                       checked
                                       @endif
                                       @endisset
                                       @empty($patient)
                                       @if(old('ethnicity')=='tamil')
                                       checked
                                    @endif
                                    @endempty>
                                <label for="tamil"> 2. Tamil
                                </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="moor" value="moor"
                                       name="ethnicity" @isset($patient)
                                       @if($patient->ethnicity=='moor')
                                       checked
                                       @endif
                                       @endisset
                                       @empty($patient)
                                       @if(old('ethnicity')=='moor')
                                       checked
                                    @endif
                                    @endempty>
                                <label for="moor"> 3. Moor
                                </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="other_ethnicity" value="other_ethnicity"
                                       name="ethnicity" @isset($patient)
                                       @if($patient->ethnicity=='other_ethnicity')
                                       checked
                                       @endif
                                       @endisset
                                       @empty($patient)
                                       @if(old('ethnicity')=='other_ethnicity')
                                       checked
                                    @endif
                                    @endempty>
                                <label for="other_ethnicity"> 4. Other
                                </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="unknown_ethnicity" value="unknown_ethnicity"
                                       name="ethnicity" @isset($patient)
                                       @if($patient->ethnicity=='unknown_ethnicity')
                                       checked
                                       @endif
                                       @endisset
                                       @empty($patient)
                                       @if(old('ethnicity')=='unknown_ethnicity')
                                       checked
                                    @endif
                                    @endempty>
                                <label for="unknown_ethnicity"> 5. Unknown
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('occupation') ? 'has-error' : '' }}">
                            <label for="occupation">{{ trans('global.patient.fields.occupation') }}*</label>
                            <input type="text" id="occupation" name="occupation" class="form-control"
                                   value="{{ old('occupation', isset($patient) ? $patient->occupation : '') }}">
                            @if($errors->has('occupation'))
                                <p class="help-block">
                                    {{ $errors->first('occupation') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.patient.fields.occupation_helper') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">{{ trans('global.patient.fields.address') }}*</label>
                            <input type="text" id="address" name="address" class="form-control"
                                   value="{{ old('address', isset($patient) ? $patient->address : '') }}">
                            @if($errors->has('address'))
                                <p class="help-block">
                                    {{ $errors->first('address') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.patient.fields.address_helper') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    {{--<div class="col-md-4">--}}
                        {{--<div class="form-group {{ $errors->has('DPDHS_area') ? 'has-error' : '' }}">--}}
                            {{--<label for="DPDHS_area">{{ trans('global.patient.fields.DPDHS_area') }}*</label>--}}
                            {{--<select id="DPDHS_area" name="DPDHS_area" class="form-control select2" style="width: 100%;">--}}
                                {{--<option--}}
                                    {{--selected="selected">{{ old('DPDHS_area', isset($patient) ? $patient->DPDHS_area: '') }}</option>--}}
                                {{--<option>Alaska</option>--}}
                                {{--<option>California</option>--}}
                                {{--<option>Delaware</option>--}}
                                {{--<option>Tennessee</option>--}}
                                {{--<option>Texas</option>--}}
                                {{--<option>Washington</option>--}}
                            {{--</select>--}}
                            {{--@if($errors->has('DPDHS_area'))--}}
                                {{--<p class="help-block">--}}
                                    {{--{{ $errors->first('DPDHS_area') }}--}}
                                {{--</p>--}}
                            {{--@endif--}}
                            {{--<p class="helper-block">--}}
                                {{--{{ trans('global.patient.fields.DPDHS_area_helper') }}--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('MOH_area') ? 'has-error' : '' }}">
                            <label for="MOH_area">{{ trans('global.patient.fields.MOH_area') }}*</label>
                            <select id="MOH_area" name="MOH_area" class="form-control select2" style="width: 100%;">
                                <option
                                    selected="selected">{{ old('MOH_area', isset($patient) ? $patient->MOH_area: '') }}</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                            @if($errors->has('MOH_area'))
                                <p class="help-block alert-warning">
                                    {{ $errors->first('MOH_area') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.patient.fields.MOH_area_helper') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('GN_area') ? 'has-error' : '' }}">
                            <label for="GN_area">{{ trans('global.patient.fields.GN_area') }}*</label>
                            <select id="GN_area" name="GN_area" class="form-control select2" style="width: 100%;">
                                <option
                                    selected="selected">{{ old('GN_area', isset($patient) ? $patient->GN_area: '') }}</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                            @if($errors->has('GN_area'))
                                <p class="help-block">
                                    {{ $errors->first('GN_area') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.patient.fields.GN_area_helper') }}
                            </p>
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
        $('#notification_at').datetimepicker({
            format: 'YYYY/MM/DD'
        });
        // $('#date_of_birth').inputmask('yyyy/mm/dd', {'placeholder': 'yyyy/mm/dd'});
        $('#date_of_birth').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    </script>
@endsection
