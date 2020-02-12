<?php

namespace App\Http\Controllers\User;

use App\Hospital;
use App\Http\Requests\MassDestroyPatientRequest;
use App\Http\Requests\StorePatientReportRequest;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientReportRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\LocationsMap;
use App\Patient;
use App\PatientReport;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PatientsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('patient_access'), 403);

        $patients_q = Patient::with('patientReport')->whereNotNull('report_form_filled_at');
        $patients = [];
        if (Auth::user()->hospital == "ALL"){
            $patients = $patients_q->get();
        }
        else{
            $hospital = Auth::user()->hospital;
            $patients = $patients_q->where('hospital','=',$hospital)->get();
        }
        return view('user.patients.index', compact('patients'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('patient_create'), 403);

//        $roles = Role::all()->pluck('title', 'id');
        $roles = [];
        $hospitals= Hospital::where('hospital_name','!=','ALL')->get();
        $districts = LocationsMap::distinct()->orderBy("district_name")->pluck("district_name");

        $MOH_areas = LocationsMap::distinct()->orderBy("moh_name")->pluck("moh_name");

        $GN_areas = LocationsMap::distinct()->orderBy("gnd_name")->pluck("gnd_name");

        return view('user.patients.create', compact('hospitals','districts','MOH_areas','GN_areas'));
    }

    public function store(StorePatientRequest $request)
    {
        abort_unless(\Gate::allows('patient_create'), 403);

        $patient = Patient::create($request->all());


        if (\Gate::allows('patient_report_create')){
            return redirect()->route('user.patient_reports.create',[$patient->id]);
        }

        return redirect()->route('user.patients.index');
    }

    public function edit(Patient $patient)
    {
        abort_unless(\Gate::allows('patient_edit'), 403);

        $hospitals= Hospital::where('hospital_name','!=','ALL')->get();
        $districts = LocationsMap::distinct()->orderBy("district_name")->pluck("district_name");

        $MOH_areas = LocationsMap::distinct()->orderBy("moh_name")->pluck("moh_name");

        $GN_areas = LocationsMap::distinct()->orderBy("gnd_name")->pluck("gnd_name");

        return view('user.patients.edit', compact('patient','hospitals','districts','MOH_areas','GN_areas'));
    }

    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        abort_unless(\Gate::allows('patient_edit'), 403);

        $patient->update($request->all());

        return redirect()->route('user.patients.index');
    }

    public function show(Patient $patient)
    {
        abort_unless(\Gate::allows('patient_show'), 403);

//        $patient->load('reports');
        if (\Gate::allows('patient_report_show')){
            $patient->patientReport()->get();
        }
        else{
            $patient->patientReport = null;
        }
        return view('user.patients.show', compact('patient'));
    }

    public function destroy(Patient $patient)
    {
        abort_unless(\Gate::allows('patient_delete'), 403);

        $patient->delete();

        return back();
    }

    public function massDestroy(MassDestroyPatientRequest $request)
    {
        Patient::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
    public function patientsWithoutReports()
    {
        abort_unless(\Gate::allows('patient_access'), 403);
//        abort_unless(\Gate::allows('patient_report_access'), 403);

        $patients_q = Patient::whereNull('report_form_filled_at');
        $patients = [];
        if (Auth::user()->hospital == "ALL"){
            $patients = $patients_q->get();
        }
        else{
            $hospital = Auth::user()->hospital;
            $patients = $patients_q->where('hospital','=',$hospital)->get();
        }

        return view('user.patients.index', compact('patients'));
    }
    public function createPatientReport(Patient $patient){
        abort_unless(\Gate::allows('patient_report_create'), 403);

        $hospitals= Hospital::where('hospital_name','!=','ALL')->orderBy('hospital_name')->get();
        return view('user.patient_reports.create',compact('patient','hospitals'));
    }

    public function storePatientReport(StorePatientReportRequest $patientReportRequest, Patient $patient){
//        var_dump($patient);

        $patient_report = PatientReport::make($patientReportRequest->all());
        $patient->patientReport()->save($patient_report);
        $patient->update(['report_form_filled_at'=>Carbon::now()->format(config('panel.date_format') . ' ' . config('panel.time_format'))]);

        return redirect()->route('user.patients.incomplete');

    }

    public function editPatientReport(Patient $patient)
    {
        abort_unless(\Gate::allows('patient_report_edit'), 403);

        $patient_report = $patient->patientReport;
        $hospitals= Hospital::where('hospital_name','!=','ALL')->orderBy('hospital_name')->get();
        return view('user.patient_reports.edit',compact('patient','hospitals','patient_report'));

    }

    public function updatePatientReport(UpdatePatientReportRequest $request, Patient $patient)
    {
        abort_unless(\Gate::allows('patient_report_edit'), 403);

        $patient->patientReport->update($request->all());

        return redirect()->route('user.patients.index');
    }
}
