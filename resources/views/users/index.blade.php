@extends('admin.layout.master')

@section('title', 'Manage Users')

@section('content')

@section('main_breadcrumb', 'Home')

@section('breadcrumb', 'Manage Users')
<div class="px-4">
    <div class="bg-white shadow-md p-6 md:p-12 rounded-4">
        <div class="d-flex px-5 py-4 justify-content-between">
            <div class="">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Create
                    User</a>
                <a href="{{ route('import-form') }}" class="btn btn-primary">Import
                    User</a>
            </div>
            <form action="{{ route('users.search') }}" method="GET" class="">
                <input type="text" name="search" placeholder="Search by name or code"
                    class="w-full md:w-auto border border-gray-300 py-1 px-3 rounded-md text-sm">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        @if ($users->isEmpty())
        <p class="mt-4 text-gray-500">No users found.</p>
        @else
        <div class="col-sm-12 px-5">
            <div class="card overflow-hidden">
                <div class="table-responsive signal-table">
                    <table class="table table-hover">
                        <tbody>
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-6 py-3">Name
                                    </th>
                                    <th class="px-6 py-3 w-25">Email
                                    </th>
                                    <th class="px-6 py-3">Vacant
                                    </th>
                                    <th class="px-6 py-3">Actions
                                    </th>
                                </tr>
                            </thead>
                            @foreach($users as $user)
                            <a href="{{ route('admin.showUserDocuments', ['family_member_id' => $user->id]) }}"
                                class="text-indigo-500 hover:text-indigo-700 block">
                                <tr>
                                    <th><img src="{{ asset('avatar.jpg') }}" alt="Triumph" class="rounded-5 me-3"
                                            style="width: 2%;">{{ $user->FirstName }} {{ $user->LastName }}</th>

                                    <th>{{ $user->email }} </th>
                                    <th class="">
                                        <div class="d-flex">
                                            <input type="checkbox" class="form-checkbox me-2"
                                                {{ $user->Vacant ? 'checked' : '' }}
                                                onchange="updateVacantStatus({{ $user->id }}, this)">
                                            <span class="ml-2 text-gray-700">Vacant</span>
                                        </div>
                                    </th>
                                    <th class="d-flex justify-content-between">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this document?')"
                                                class="border-0 ">
                                                <i class="fa-solid fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </th>
                                </tr>
                            </a>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="px-5 pb-4">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
        @endif
    </div>
</div>

<script>
function updateVacantStatus(userId, checkbox) {
    const vacant = checkbox.checked ? 1 : 0;

    // Show alert before updating vacant status
    if (confirm('Are you sure you want to update the vacant status?')) {
        fetch(`/users/${userId}/update-vacant-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    vacant
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error('There was an error updating the vacant status:', error);
            });
    } else {
        // If user cancels, revert checkbox state
        checkbox.checked = !checkbox.checked;
    }
}
</script>
@endsection