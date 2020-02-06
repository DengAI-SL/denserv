@extends('layouts.admin')
@section('content')
@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("user.patients.create") }}">
                {{ trans('global.add') }} {{ trans('global.patient.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.patient.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.patient.fields.hospital') }}
                        </th>
                        <th>
                            {{ trans('global.patient.fields.bht_no') }}
                        </th>
                        <th>
                            {{ trans('global.patient.fields.notification_at') }}
                        </th>
                        {{--<th>--}}
                            {{--{{ trans('global.patient.fields.case_no') }}--}}
                        {{--</th>--}}
                        <th>
                            {{ trans('global.patient.fields.name') }}
                        </th>
                        <th>
                            {{ trans('global.patient.fields.age') }}
                        </th>
                        <th>
                            {{ trans('global.patient.fields.date_of_birth') }}
                        </th>
                        <th>
                            {{ trans('global.patient.fields.gender') }}
                        </th>
                        <th>
                            {{ trans('global.patient.fields.ethnicity') }}
                        </th>
                        <th>
                            {{ trans('global.patient.fields.occupation') }}
                        </th>
                        <th>
                            {{ trans('global.patient.fields.address') }}
                        </th>
                        {{--<th>--}}
                            {{--{{ trans('global.patient.fields.DPDHS_area') }}--}}
                        {{--</th>--}}
                        <th>
                            {{ trans('global.patient.fields.MOH_area') }}
                        </th>
                        <th>
                            {{ trans('global.patient.fields.GN_area') }}
                        </th>
                        <th>
                            {{ trans('global.patient.fields.report_form_filled_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patients as $key => $patient)
                        <tr data-entry-id="{{ $patient->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $patient->hospital ?? '' }}
                            </td>
                            <td>
                                {{ $patient->bht_no ?? '' }}
                            </td>
                            <td>
                                {{ $patient->notification_at ?? '' }}
                            </td>
                            {{--<td>--}}
                                {{--{{ $patient->case_no ?? '' }}--}}
                            {{--</td>--}}
                            <td>
                                {{ $patient->name ?? '' }}
                            </td>
                            <td>
                                {{ $patient->age_years ?? '' }} y {{$patient->age_months ?? ''}} m
                            </td>
                            <td>
                                {{ $patient->date_of_birth ?? '' }}
                            </td>
                            <td>
                                {{ $patient->gender ?? '' }}
                            </td>
                            <td>
                                {{ $patient->ethnicity ?? '' }}
                            </td>
                            <td>
                                {{ $patient->occupation ?? '' }}
                            </td>
                            <td>
                                {{ $patient->address ?? '' }}
                            </td>
                            {{--<td>--}}
                                {{--{{ $patient->DPDHS_area ?? '' }}--}}
                            {{--</td>--}}
                            <td>
                                {{ $patient->MOH_area ?? '' }}
                            </td>
                            <td>
                                {{ $patient->GN_area ?? '' }}
                            </td>
                            <td>
                                {{ $patient->report_form_filled_at ?? '' }}
                            </td>
                            {{--<td>--}}
                                {{--@foreach($patient->roles as $key => $item)--}}
                                    {{--<span class="badge badge-info">{{ $item->title }}</span>--}}
                                {{--@endforeach--}}
                            {{--</td>--}}
                            <td>
                                @can('patient_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('user.patients.show', $patient->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('patient_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('user.patients.edit', $patient->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('patient_delete')
                                    <form action="{{ route('user.patients.destroy', $patient->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('user_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
