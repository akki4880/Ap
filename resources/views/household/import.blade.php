@extends('admin.layout.master')

@section('title', 'Import HouseholdData')

@section('content')

@section('main_breadcrumb', 'Home')

@section('breadcrumb', 'Import HouseholdData')
<div class=" px-4">
        <h1 class="text-3xl font-bold mb-8 mt-12"></h1>

        <form action="{{ route('household.import') }}" method="post" enctype="multipart/form-data"
            class="bg-white shadow-md rounded-5 p-5 pt-6 pb-8 mb-4 ">
            @csrf

            <div class="mb-4">
                <label class="fw-blod fs-6" for="file">
                Choose Excel File:
                </label>
                <input type="file" name="file" id="file" accept=".xlsx, .csv" required
                    class="form-control w-25">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="btn btn-primary">
                    Import Data
                </button>
            </div>
        </form>
    </div> 
    @endsection