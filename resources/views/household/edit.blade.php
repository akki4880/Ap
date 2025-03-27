@extends('admin.layout.master')

@section('title', 'Edit Household')

@section('content')

@section('main_breadcrumb', 'Home')

@section('breadcrumb', 'Edit Household')
    <div class="max-w-6xl mx-auto py-8 px-4">
        <div class="bg-white rounded-lg shadow-md p-5 mt-12"> 
            <form action="{{ route('household.update', $household->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="UnitNo" class="form-label">Unit Number</label>
                        <input type="text" name="UnitNo" id="UnitNo" value="{{ $household->UnitNo }}"
                            class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label for="userId" class="form-label">User ID</label>
                        <input type="text" name="userId" id="userId" value="{{ $household->userId }}"
                            class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" name="firstName" id="firstName" value="{{ $household->firstName }}"
                            class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" name="lastName" id="lastName" value="{{ $household->lastName }}"
                            class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label for="AdultOrMinor" class="form-label">Adult or Minor</label>
                        <input type="text" name="AdultOrMinor" id="AdultOrMinor" value="{{ $household->AdultOrMinor }}"
                            class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label for="Relation" class="form-label">Relation</label>
                        <input type="text" name="Relation" id="Relation" value="{{ $household->Relation }}"
                            class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label for="Student" class="form-label">Student</label>
                        <input type="text" name="Student" id="Student" value="{{ $household->Student }}"
                            class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label for="Age" class="form-label">Age</label>
                        <input type="number" name="Age" id="Age" value="{{ $household->Age }}" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label for="FamilySize" class="form-label">Family Size</label>
                        <input type="number" name="FamilySize" id="FamilySize" value="{{ $household->FamilySize }}"
                            class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label for="CertificationDate" class="form-label">Certification Date</label>
                        <input type="text" name="CertificationDate" id="CertificationDate"
                            value="{{ $household->CertificationDate }}" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label for="RecertificationDate" class="form-label">Recertification Date</label>
                        <input type="text" name="RecertificationDate" id="RecertificationDate"
                            value="{{ $household->RecertificationDate }}" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label for="Code" class="form-label">Code</label>
                        <input type="text" name="Code" id="Code" value="{{ $household->Code }}" class="form-control">
                    </div>
                </div>

                <div class="col-12 text-end mt-4">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('household.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>

        </div>
    </div>
    @endsection