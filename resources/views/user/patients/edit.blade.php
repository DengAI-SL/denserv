@extends('layouts.admin')
@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Patient Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Patient Management</a></li>
                    <li class="breadcrumb-item active">Edit Patient Form</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('global.patient.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("user.patients.update",[$patient->id]) }}" method="POST" enctype="multipart/form-data"
                  class="{{ $errors->isEmpty() ? 'needs-validation' : 'was-validated' }}" novalidate>
                @csrf
                @method('PUT')
                <div class="d-flex flex-row">
                    <div class="col-md-4">
                        <div class="form-group" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.patient.fields.hospital_helper') }}">
                            <label for="hospital">{{ trans('global.patient.fields.hospital') }}*</label>
                            <select id="hospital" name="hospital"
                                    class="form-control select2  {{ $errors->has('hospital') ? 'is-invalid' : '' }}"
                                    style="width: 100%;" required {{Auth::user()->hospital!=='ALL'?'disabled':''}}>
                                @isset($patient)
                                    <option> {{$patient->hospital}}</option>
                                @endisset
                                @empty($patient)
                                    @if(old('hospital','')!=='')
                                        <option> {{old('hospital')}}</option>
                                    @else
                                        {{Auth::user()->hospital!='ALL'?"<option>".old('hospital')."</option>":''}}
                                    @endif
                                    <option
                                        selected="selected">{{ old('hospital', isset($hospital) ? $hospital: '') }}</option>
                                @endempty
                                @foreach($hospitals as $hospital)
                                    <option> {{$hospital->hospital_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('hospital'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('hospital') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient.fields.hospital_error') }} is required
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.patient.fields.bht_no_helper') }}">
                            <label for="name">{{ trans('global.patient.fields.bht_no') }}*</label>
                            <input type="text" id="bht_no" name="bht_no"
                                   class="form-control  {{ $errors->has('bht_no') ? 'is-invalid' : '' }}"
                                   value="{{ old('bht_no', isset($patient) ? $patient->bht_no : '') }}" required>
                            @if($errors->has('bht_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('bht_no') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient.fields.bht_no_error') }} is required
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.patient.fields.notification_at_helper') }}">
                            <label for="notification_at">{{ trans('global.patient.fields.notification_at') }}*</label>
                            <input type="text" id="notification_at" name="notification_at"
                                   class="form-control {{ $errors->has('notification_at') ? 'is-invalid' : '' }}"
                                   value="{{ old('notification_at', isset($patient) ? $patient->notification_at : '') }}"
                                   data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" required>
                            @if($errors->has('notification_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notification_at') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient.fields.notification_at_error') }} is required
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{--<div class="d-flex flex-row">--}}
                {{--<div class="col-md-4">--}}
                {{--<div class="form-group {{ $errors->has('case_no') ? 'is-invalid' : '' }}">--}}
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

                        <div class="form-group" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.patient.fields.name_helper') }}">
                            <label for="name">{{ trans('global.patient.fields.name') }}*</label>
                            <input type="text" id="name" name="name"
                                   class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                   value="{{ old('name', isset($patient) ? $patient->name : '') }}"
                                   style="text-transform: uppercase;" placeholder="A.B.C. DE SILVA" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient.fields.name_error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-2">

                        <div class="form-group" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.patient.fields.age_years_helper') }}">
                            <label for="age_years">{{ trans('global.patient.fields.age_years') }}*</label>
                            <input type="number" id="age_years" name="age_years"
                                   class="form-control  {{ $errors->has('age_years') ? 'is-invalid' : '' }}"
                                   value="{{ old('age_years', isset($patient) ? $patient->age_years : '') }}" min="0"
                                   step="1" required>
                            @if($errors->has('age_years'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('age_years') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient.fields.age_years_error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-2">

                        <div class="form-group" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.patient.fields.age_months_helper') }}">
                            <label for="age_months">{{ trans('global.patient.fields.age_months') }}*</label>
                            <input type="number" id="age_months" name="age_months"
                                   class="form-control  {{ $errors->has('age_months') ? 'is-invalid' : '' }}"
                                   value="{{ old('age_months', isset($patient) ? $patient->age_months : '') }}" min="0"
                                   step="1" required>
                            @if($errors->has('age_months'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('age_months') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient.fields.age_months_error') }}
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="date_of_birth">{{ trans('global.patient.fields.date_of_birth') }}*</label>
                            <input type="text" id="date_of_birth" name="date_of_birth"
                                   class="form-control {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}"
                                   value="{{ old('date_of_birth', isset($patient) ? $patient->date_of_birth : '') }}"
                                   data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                   data-toggle="tooltip" data-placement="top" data-html="true"
                                   title="{{ trans('global.patient.fields.date_of_birth_helper') }}" data-mask>
                            @if($errors->has('date_of_birth'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_of_birth') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient.fields.date_of_birth_error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="col-sm-5">
                        <!-- radio -->
                        <div class="form-group clearfix" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.patient.fields.gender_helper') }}*">
                            <div class="row">
                                <label for="gender">{{ trans('global.patient.fields.gender') }} </label>
                            </div>
                            <div class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}">
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
                            @if($errors->has('gender'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gender') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient.fields.gender_error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <!-- radio -->
                        <div class="form-group clearfix" data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.patient.fields.ethnicity_helper') }}">
                            <div class="row">
                                <label for="ethnicity">{{ trans('global.patient.fields.ethnicity') }} </label>
                            </div>
                            <div class="form-control {{ $errors->has('ethnicity') ? 'is-invalid' : '' }}">
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
                            @if($errors->has('ethnicity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ethnicity') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient.fields.ethnicity_error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="col-md-4">
                        <div class="form-group"
                             data-toggle="tooltip" data-placement="top" data-html="true"
                             title="{{ trans('global.patient.fields.occupation_helper') }}">
                            <label for="occupation">{{ trans('global.patient.fields.occupation') }}</label>
                            <select id="occupation" name="occupation"
                                    class="form-control select2  {{ $errors->has('occupation') ? 'is-invalid' : '' }}"
                                    style="width: 100%;" required>
                                <option
                                    selected="selected">{{ old('occupation', isset($patient) ? $patient->occupation: '') }}</option>
                                <option> Healthcare and medicine</option>
                                <option> Arts and entertainment</option>
                                <option>Business</option>
                                <option> Industrial and manufacturing</option>
                                <option>Law enforcement and armed forces</option>
                                <option> Science and technology</option>
                                <option> Service</option>
                            </select>
                            @if($errors->has('occupation'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('occupation') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient.fields.occupation_error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group" data-toggle="tooltip"
                             data-placement="top" data-html="true"
                             title="{{ trans('global.patient.fields.address_helper') }}">
                            <label for="address">{{ trans('global.patient.fields.address') }}</label>
                            <input type="text" id="address" name="address"
                                   class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                   value="{{ old('address', isset($patient) ? $patient->address : '') }}">
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient.fields.address_error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="col-md-4">
                        <div class="form-group" data-toggle="tooltip"
                             data-placement="top" data-html="true"
                             title="{{ trans('global.patient.fields.district_helper') }}">
                            <label for="district">{{ trans('global.patient.fields.district') }}*</label>
                            <select id="district" name="district"
                                    class="form-control select2 {{ $errors->has('district') ? 'is-invalid' : '' }}"
                                    style="width: 100%;" required>
                                <option></option>
                                @foreach($districts as $district)
                                    <option
                                        value="{{ $district }}" {{ old('district', isset($patient) ? $patient->district:'')==$district ? 'selected' : '' }}>
                                        {{ $district}}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('district'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('district') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient.fields.district_error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" data-toggle="tooltip"
                             data-placement="top" data-html="true"
                             title="{{ trans('global.patient.fields.MOH_area_helper') }}">
                            <label for="MOH_area">{{ trans('global.patient.fields.MOH_area') }}*</label>
                            <select id="MOH_area" name="MOH_area"
                                    class="form-control select2  {{ $errors->has('MOH_area') ? 'is-invalid' : '' }}"
                                    style="width: 100%;"
                                    required>
                                <option></option>
                                @if(old('MOH_area', isset($patient) ? $patient->MOH_area:'')!=='')
                                    {{--@foreach($MOH_areas as $id => $MOH_area)--}}
                                    <option
                                        value="{{ old('MOH_area', isset($patient) ? $patient->MOH_area:'') }}"  selected="selected">
                                        {{ old('MOH_area', isset($patient) ? $patient->MOH_area:'') }}
                                    </option>
                                    {{--@endforeach--}}
                                @endisset
                            </select>
                            @if($errors->has('MOH_area'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('MOH_area') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient.fields.MOH_area_error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" data-toggle="tooltip"
                             data-placement="top" data-html="true"
                             title="{{ trans('global.patient.fields.GN_area_helper') }}">
                            <label for="GN_area">{{ trans('global.patient.fields.GN_area') }}</label>
                            <select id="GN_area" name="GN_area"
                                    class="form-control select2 {{ $errors->has('GN_area') ? 'is-invalid' : '' }}"
                                    style="width: 100%;" >
                                <option></option>
                                @if(old('GN_area', isset($patient) ? $patient->GN_area:'')!=='')
                                    {{--@foreach($GN_areas as $id => $GN_area)--}}
                                    <option
                                        value="{{ old('GN_area', isset($patient) ? $patient->GN_area:'') }}"  selected="selected">
                                        {{ old('GN_area', isset($patient) ? $patient->GN_area:'') }}
                                    </option>
                                    {{--@endforeach--}}
                                @endisset
                            </select>
                            @if($errors->has('GN_area'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('GN_area') }}
                                </div>
                            @else
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    {{ trans('global.patient.fields.GN_area_error') }}
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
        $('#notification_at').datetimepicker({
            format: 'YYYY/MM/DD'
        });
        // $('#date_of_birth').inputmask('yyyy/mm/dd', {'placeholder': 'yyyy/mm/dd'});
        $('#date_of_birth').datetimepicker({
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

        var csrf = $('meta[name=csrf-token]').attr('content');
        $(document).ready(function () {
            $('#district').select2({
                placeholder: "{{trans('global.patient.fields.districts_placeholder')}}",
            });
            $('#MOH_area').select2({
                placeholder: "{{trans('global.patient.fields.MOH_area_placeholder')}}"
            });
            $('#GN_area').select2({
                placeholder: "{{trans('global.patient.fields.GN_area_placeholder')}}"
            });
            $('#MOH_area').prop("disabled", true);
            $('#GN_area').prop("disabled", true);

            $('#district').change(function (e) {

                e.preventDefault();
                var district = $("#district option:selected").text();
                e.preventDefault();

                $.ajax({
                    data: {
                        '_token': csrf,
                        district: district,
                    },
                    type: 'POST',
                    url: '/user/locations_map/filter/district',
                    // dataType: 'JSON',
                    success: function (response) {
                        var MOH_areas = mapData(response.MOH_areas);
                        // var GN_areas = mapData(response.GN_areas);
                        $('#MOH_area').empty();
                        $("#MOH_area").select2({
                            placeholder: "{{trans('global.patient.fields.MOH_area_placeholder')}}",
                            data: MOH_areas
                        });
                        $('#MOH_area').prop("disabled", false);

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("We got an error processing the request");
                        console.log(errorThrown);
                        console.log(jqXHR);
                    },

                });

            });
            $('#MOH_area').change(function (e) {

                e.preventDefault();
                var MOH_area = $("#MOH_area option:selected").text();
                $('#GN_area').empty();
                $.ajax({
                    data: {
                        '_token': csrf,
                        MOH_area: MOH_area,
                    },
                    type: 'POST',
                    url: '/user/locations_map/filter/moh',
                    // dataType: 'JSON',
                    success: function (response) {
                        var GN_areas = mapData(response.GN_areas);
                        // var GN_areas = mapData(response.GN_areas);
                        $("#GN_area").select2({
                            placeholder: "{{trans('global.patient.fields.GN_area_placeholder')}}",
                            data: GN_areas
                        });
                        $('#GN_area').prop("disabled", false);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("We got an error processing the request");
                        console.log(errorThrown);
                        console.log(jqXHR);
                    },

                });

            });
        });

        function mapData(array) {
            var mappedArray = [{id: "", text: ""}];
            for (var i = 0; i < array.length; i++) {
                mappedArray.push({
                    'id': array[i],
                    text: array[i],
                })
            }
            return mappedArray;
        }


    </script>
@endsection
