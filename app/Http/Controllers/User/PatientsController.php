<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\MassDestroyPatientRequest;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Patient;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('patient_access'), 403);

        $patients = Patient::all();
//        var_dump($patients);
//        $patients = User::all();
        return view('user.patients.index', compact('patients'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('patient_create'), 403);

//        $roles = Role::all()->pluck('title', 'id');
        $roles = [];
        return view('user.patients.create', compact('roles'));
    }

    public function store(StorePatientRequest $request)
    {
        abort_unless(\Gate::allows('patient_create'), 403);

        $patient = Patient::create($request->all());

//        var_dump($role);

        return redirect()->route('user.patients.index');
    }

    public function edit(Patient $patient)
    {
        abort_unless(\Gate::allows('patient_edit'), 403);


        return view('user.patients.edit', compact('patient'));
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
}
