<!-- edit.blade.php -->
@extends('admin.layout.master')

@section('title', 'Edit User')

@section('content')

@section('main_breadcrumb', 'Home')

@section('breadcrumb', 'Edit User')
<div class="max-w-6xl mx-auto py-8 px-4">
    <div class="bg-white rounded-lg shadow-md p-5 mt-3"> 
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-4">
                    <label class="form-label" for="name">Name</label>
                    <input class="form-control" id="name" type="text" name="name" value="{{ $user->name }}"
                        placeholder="First name" required>
                </div>

                <div class="col-4">
                    <label class="form-label" for="email">Email address</label>
                    <input class="form-control" id="email" type="email" name="email" value="{{ $user->email }}"
                        placeholder="example@domain.com" required>
                </div>

                <div class="col-4">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" id="password" type="password" name="password"
                        value="{{ $user->password }}" required>
                </div>

                <div class="col-4">
                    <label class="form-label" for="UserId">User ID</label>
                    <input class="form-control" id="UserId" type="text" name="UserId" value="{{ $user->UserId }}"
                        required>
                </div>

                <div class="col-4">
                    <label class="form-label" for="UnitNo">Unit Number</label>
                    <input class="form-control" id="UnitNo" type="text" name="UnitNo" value="{{ $user->UnitNo }}"
                        required>
                </div>

                <div class="col-4">
                    <label class="form-label" for="FirstName">First Name</label>
                    <input class="form-control" id="FirstName" type="text" name="FirstName"
                        value="{{ $user->FirstName }}" required>
                </div>

                <div class="col-4">
                    <label class="form-label" for="LastName">Last Name</label>
                    <input class="form-control" id="LastName" type="text" name="LastName" value="{{ $user->LastName }}"
                        required>
                </div>

                <div class="col-4">
                    <label class="form-label" for="Age">Age</label>
                    <input class="form-control" id="Age" type="number" name="Age" value="{{ $user->Age }}" required>
                </div>

                <div class="col-4">
                    <label class="form-label" for="FamilySize">Family Size</label>
                    <input class="form-control" id="FamilySize" type="number" name="FamilySize"
                        value="{{ $user->FamilySize }}" required>
                </div>

                <div class="col-4">
                    <label class="form-label" for="CertificationDate">Certification Date</label>
                    <input class="form-control" id="CertificationDate" type="date" name="CertificationDate"
                        value="{{ $user->CertificationDate }}" required>
                </div>

                <div class="col-4">
                    <label class="form-label" for="RecertificationDate">Recertification Date</label>
                    <input class="form-control" id="RecertificationDate" type="date" name="RecertificationDate"
                        value="{{ $user->RecertificationDate }}" required>
                </div>

                <div class="col-4">
                    <label class="form-label" for="ChangePwd">isVerifyPassword</label>
                    <select class="form-select" id="ChangePwd" name="ChangePwd" required>
                        <option value="1" {{ $user->ChangePwd == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ $user->ChangePwd == 0 ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="col-4">
                    <label class="form-label" for="ContactDetails">isVerifyContact Details</label>
                    <select class="form-select" id="ContactDetails" name="ContactDetails" required>
                        <option value="1" {{ $user->ContactDetails == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ $user->ContactDetails == 0 ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="col-4">
                    <label class="form-label" for="PhoneNumber">Phone Number</label>
                    <input class="form-control" id="PhoneNumber" type="tel" name="PhoneNumber"
                        value="{{ $user->PhoneNumber }}" required>
                </div>

                <div class="col-4">
                    <label class="form-label" for="Code">Code</label>
                    <input class="form-control" id="Code" type="text" name="Code" value="{{ $user->Code }}" required>
                </div> 

                <div class="col-12 pt-4 text-end">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection