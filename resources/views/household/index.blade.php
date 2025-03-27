@extends('admin.layout.master')

@section('title', 'Manage Household Data')

@section('content')

@section('main_breadcrumb', 'Home')

@section('breadcrumb', 'Manage Household Data')
<div class="px-4 ">
    <div class="bg-white rounded-lg shadow-md p-5 rounded-4"> 
        <div class="d-flex justify-content-between">
            <div class="">
                <a href="{{ route('household.create') }}" class="btn btn-primary">Add
                    Household</a>
                <a href="{{ route('household.import.form') }}" class="btn btn-primary">Import
                    Household</a>

            </div>
            <form action="{{ route('household.search') }}" method="GET" class=" ">
                <input type="text" name="search" placeholder="Search by code, unit number, first name, or last name"
                    class=" ">

                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        @if ($householdData->isEmpty())
        <p class="mt-4 text-gray-500">No household data found.</p>
        @else
        <div class=" px-1 mt-4">
            <table class="table table-hover">
                <thead class="bg-light">
                    <tr>
                        <th class="px-3 py-2 ">UnitNo</th>
                        <th class="px-3 py-2 ">User ID</th>
                        <th class="px-3 py-2 ">First Name</th>
                        <th class="px-3 py-2 ">Property Code</th>
                        <th class="px-3 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($householdData as $data)
                    <tr>
                        <td class="px-3 py-2">{{ $data->UnitNo }}</td>
                        <td class="px-3 py-2">{{ $data->userId }}</td>
                        <td class="px-3 py-2">{{ $data->firstName }} {{ $data->lastName }}</td>
                        <td class="px-3 py-2">{{ $data->Code }}</td>
                        <td class="px-3 py-2 d-flex  justify-content-center">
                            <a href="{{ route('household.edit', $data->id) }}" class="text-primary">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <form action="{{ route('household.destroy', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this document?')"
                                    class="border-0 bg-transparent text-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="px-1 py-4">
            {{ $householdData->links('pagination::bootstrap-5') }}
        </div>
        @endif
    </div>

</div>
@endsection