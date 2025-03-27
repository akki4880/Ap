@extends('admin.layout.master')

@section('title', 'Add New Household Data')

@section('content')

@section('main_breadcrumb', 'Home')

@section('breadcrumb', 'Add New Household Data')
<div class="max-w-6xl mx-auto py-8 px-4">
    <div class="bg-white rounded-lg shadow-md p-5 mt-12">
        <form action="{{ route('household.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-4">
                    <label for="UnitNo" class="form-label">Unit Number</label>
                    <input type="text" name="UnitNo" id="UnitNo" value="{{ old('UnitNo') }}" class="form-control">
                    @error('UnitNo')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="userId" class="form-label">User ID</label>
                    <input type="text" name="userId" id="userId" value="{{ old('userId') }}" class="form-control">
                    @error('userId')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" name="firstName" id="firstName" value="{{ old('firstName') }}"
                        class="form-control">
                    @error('firstName')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" name="lastName" id="lastName" value="{{ old('lastName') }}" class="form-control">
                    @error('lastName')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="AdultOrMinor" class="form-label">Adult or Minor</label>
                    <select name="AdultOrMinor" id="AdultOrMinor" class="form-select">
                        <option value="Adult">Adult</option>
                        <option value="Minor">Minor</option>
                    </select>
                    @error('AdultOrMinor')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="Relation" class="form-label">Relation</label>
                    <input type="text" name="Relation" id="Relation" value="{{ old('Relation') }}" class="form-control">
                    @error('Relation')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="Student" class="form-label">Student</label>
                    <input type="text" name="Student" id="Student" value="{{ old('Student') }}" class="form-control">
                    @error('Student')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="Age" class="form-label">Age</label>
                    <input type="number" name="Age" id="Age" value="{{ old('Age') }}" class="form-control">
                    @error('Age')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="FamilySize" class="form-label">Family Size</label>
                    <input type="number" name="FamilySize" id="FamilySize" value="{{ old('FamilySize') }}"
                        class="form-control">
                    @error('FamilySize')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="CertificationDate" class="form-label">Certification Date</label>
                    <input type="date" name="CertificationDate" id="CertificationDate"
                        value="{{ old('CertificationDate') }}" class="form-control">
                    @error('CertificationDate')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="RecertificationDate" class="form-label">Recertification Date</label>
                    <input type="date" name="RecertificationDate" id="RecertificationDate"
                        value="{{ old('RecertificationDate') }}" class="form-control">
                    @error('RecertificationDate')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="Code" class="form-label">Code</label>
                    <input type="text" name="Code" id="Code" value="{{ old('Code') }}" class="form-control">
                    @error('Code')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12 text-end mt-4">
                <button type="submit" class="btn btn-primary">Add Household Data</button>
                <a href="{{ route('household.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>

    </div>
</div>
@endsection