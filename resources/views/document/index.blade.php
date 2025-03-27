@extends('admin.layout.master')

@section('title', 'ALL Documents')

@section('content')

@section('main_breadcrumb', 'Home')

@section('breadcrumb', 'ALL Documents')
<div class="py-8 px-4">
    <div class="bg-white rounded-5 shadow-md p-5">  
        <div class="flex flex-col md:flex-row items-start md:items-center justify-end mb-4">
            <form action="{{ route('documents.search') }}" method="GET">
                <div class="d-flex">
                    <input type="text" name="search" placeholder="Search by  first name, or last name"
                        class="form-control w-25 me-2">

                    <button type="submit"
                        class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>

        <div class="col-sm-12 px-2">
            <div class="card overflow-hidden">
                <div class="table-responsive signal-table">
                    <table class="table table-hover">
                        <thead>
                            <tr class="bg-gray-100">
                                <th
                                    class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Document Name</th>
                                <th
                                    class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    FamilyHead</th>
                                <th
                                    class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Family Member</th>
                                <th
                                    class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    File</th>
                                <th
                                    class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($documents as $document)
                            <tr>
                                <td class="px-6 py-1 whitespace-no-wrap">
                                    @php
                                    $words =
                                    str_word_count(App\Models\Document::$documentNames[$document->document_number -
                                    1], 1);
                                    $chunks = array_chunk($words, 10);
                                    @endphp

                                    @foreach ($chunks as $chunk)
                                    {{ implode(' ', $chunk) }}<br>
                                    @endforeach
                                </td>

                                <td class="px-6 py-1 whitespace-no-wrap">{{ $document->user->name }}</td>
                                <td class="px-6 py-1 whitespace-no-wrap">
                                    @if($document->familyMember)
                                    {{ $document->familyMember->firstName }} {{ $document->familyMember->lastName }}
                                    @endif
                                </td>
                                <td class="px-6 py-1 whitespace-no-wrap">
                                    <a href="{{ route('view.pdf', ['fileName' => $document->document_name]) }}"
                                        target="_blank" class="text-blue-500 hover:underline">
                                        <i class="fa-solid fa-file"></i>
                                    </a>
                                </td>
                                <td class="px-6 py-1 whitespace-no-wrap">
                                    @php
                                    $statusClass = '';
                                    switch($document->status) {
                                    case 'pending':
                                    $statusClass = 'bg-warning  text-yellow-800';
                                    break;
                                    case 'verified':
                                    $statusClass = 'bg-success text-green-800';
                                    break;
                                    case 'rejected':
                                    $statusClass = 'bg-danger text-red-800';
                                    break;
                                    default:
                                    $statusClass = 'bg-warning text-gray-800';
                                    }
                                    @endphp

                                    <span
                                        class="inline-block px-2 py-1 rounded {{ $statusClass }} text-dark">{{ $document->status }}</span>

                                    @if($document->status === 'rejected')
                                    <span
                                        class="inline-block px-2 py-1 rounded">Comments:({{ $document->comments }})</span>
                                    @endif
                                </td>


                                <td class="px-6 py-2 whitespace-no-wrap d-flex justify-content-center">
                                    <a href="{{ route('documents.edit', $document->id) }}"
                                        class="me-2">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <form action="{{ route('documents.destroy', $document->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this document?')"
                                            class=" border-0">
                                            <i class="fa-solid fa-trash text-danger"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $documents->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection