<!-- create.blade.php -->
@extends('admin.layout.master')

@section('title', 'Create User')

@section('content')

@section('main_breadcrumb', 'Home')

@section('breadcrumb', 'Create User')
<div class="max-w-6xl mx-auto py-8 px-4">
    <div class="bg-white rounded-lg shadow-md p-5"> 

        <form class="row g-3" action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="col-4">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" id="name" type="text" name="name" placeholder="Name" required>
            </div>

            <div class="col-4">
                <label class="form-label" for="email">Email address</label>
                <input class="form-control" id="email" type="email" name="email" placeholder="example@mail.com"
                    required>
            </div>

            <div class="col-4">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" id="password" type="password" name="password" required>
            </div>

            <div class="col-4">
                <label class="form-label" for="UserId">User ID</label>
                <input class="form-control" id="UserId" type="text" name="UserId" required>
            </div>

            <div class="col-4">
                <label class="form-label" for="UnitNo">Unit Number</label>
                <input class="form-control" id="UnitNo" type="text" name="UnitNo" required>
            </div>

            <div class="col-4">
                <label class="form-label" for="FirstName">First Name</label>
                <input class="form-control" id="FirstName" type="text" name="FirstName" required>
            </div>

            <div class="col-4">
                <label class="form-label" for="LastName">Last Name</label>
                <input class="form-control" id="LastName" type="text" name="LastName" required>
            </div>

            <div class="col-4">
                <label class="form-label" for="Age">Age</label>
                <input class="form-control" id="Age" type="number" name="Age" required>
            </div>

            <div class="col-4">
                <label class="form-label" for="FamilySize">Family Size</label>
                <input class="form-control" id="FamilySize" type="number" name="FamilySize" required>
            </div>

            <div class="col-4">
                <label class="form-label" for="CertificationDate">Certification Date</label>
                <input class="form-control" id="CertificationDate" type="date" name="CertificationDate" required>
            </div>

            <div class="col-4">
                <label class="form-label" for="RecertificationDate">Recertification Date</label>
                <input class="form-control" id="RecertificationDate" type="date" name="RecertificationDate" required>
            </div>

            <div class="col-4">
                <label class="form-label" for="ChangePwd">Change Password</label>
                <input class="form-control" id="ChangePwd" type="text" name="ChangePwd" required>
            </div>

            <div class="col-4">
                <label class="form-label" for="ContactDetails">Contact Details</label>
                <input class="form-control" id="ContactDetails" type="text" name="ContactDetails" required>
            </div>

            <div class="col-4">
                <label class="form-label" for="PhoneNumber">Phone Number</label>
                <input class="form-control" id="PhoneNumber" type="tel" name="PhoneNumber" required>
            </div>

            <div class="col-4">
                <label class="form-label" for="Code">Code</label>
                <input class="form-control" id="Code" type="text" name="Code" required>
            </div> 

            <div class="col-12 mt-3">
                <button class="btn btn-primary float-end" type="submit">Create User</button>
            </div>
        </form>
    </div>
</div>
@endsection