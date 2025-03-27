@extends('admin.layout.master')

@section('title', 'User-documents')

@section('content')

@section('main_breadcrumb', 'Home')

@section('breadcrumb', 'User-documents')
<div class="">
    <div class="bg-white rounded-lg shadow-md p-5 rounded-5">
        <h1 class="text-3xl font-bold mb-6">Head Family Name - {{ $user->name ?? ' ' }}</h1>
        @if($documents->isNotEmpty())
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Family Member Details</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <th><strong>Name:</strong></th>
                            <td class="px-5">{{ $documents[0]->familyMember->firstName }}
                            <th><strong>Relation:</strong></th>
                            <td class="px-5">{{ $documents[0]->familyMember->Relation }}
                            </td>

                        </tr>
                        <tr>
                            <th><strong>Property:</strong></th>
                            <td class="px-5">
                                {{ $propertyNames[$documents[0]->familyMember->Code] }}</td>
                            <th><strong>UnitNo</strong></th>
                            <td class="px-5">{{ $documents[0]->familyMember->UnitNo}}
                            </td>
                        </tr>
                        <tr>
                            <th><strong>Date of Birth:</strong></th>
                            <td class="px-5">{{ $documents[0]->familyMember->dob }}</td>
                            <th><strong>Age:</strong></th>
                            <td class="px-5"> @php
                                $age = \Carbon\Carbon::parse( $documents[0]->familyMember->dob)->age;
                                $status = $age < 18 ? 'Minor' : 'Adult' ; @endphp {{ $age }} years old - {{ $status }}
                                    </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <h3 class="my-3">Document Details</h3>
        <div class="dt-ext table-responsive border p-2">
            <table class="display" id="show-hidden-row">
                <thead style="backgroung:grey;"> 
                    <tr>
                        <th>
                            Document Name
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            View Document
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($documents as $document)
                    <tr>
                        <td class="px-6 py-1 whitespace-no-wrap">
                            @php
                            $words = str_word_count(App\Models\Document::$documentNames[$document->document_number -
                            1], 1);
                            $chunks = array_chunk($words, 10);
                            @endphp

                            @foreach ($chunks as $chunk)
                            {{ implode(' ', $chunk) }}<br>
                            @endforeach
                        </td>

                        <td class="px-6 py-1 whitespace-no-wrap">
                            @if($document->status !== 'pending')
                            <div class="d-flex gap-3">
                            <span class="inline-block px-2 py-1 rounded 
                            {{ $document->status === 'verified' ? 'bg-success f-w-700' 
                                : ($document->status === 'rejected' ? 'bg-danger f-w-700' 
                                    : 'bg-yellow text-yellow-800') }}">
                                {{ $document->status }}
                            </span>
                            @if($document->status === 'rejected')
                                <p class="text-red-600 font-semibold mt-2">Comments:
                                    {{ $document->comments }}</p>
                            </div>
                            @endif
                            @endif
                            @if($document->status === 'pending')
                            <div class="d-flex gap-2">
                                <form method="post"
                                    action="{{ route('admin.approveDocument', ['documentId' => $document->id]) }}"
                                    class="inline">
                                    @csrf
                                    <button type="submit"
                                        class="bg-success f-w-600 text-white border-0 px-4 py-1 rounded">Approve</button>
                                </form>

                                <!-- Inside the foreach loop -->
                                <form method="post"
                                    action="{{ route('admin.rejectDocument', ['documentId' => $document->id]) }}"
                                    class="inline">
                                    @csrf
                                    <input id="commentsList" type="text" name="comments" placeholder="Reject Comments"
                                        class="border border-gray-300 rounded-md px-2 py-1 w-48" list="commentsList">
                                    <datalist id="commentsList">
                                        <!-- Add suggested comments options -->
                                        <option value="Option 1">
                                        <option value="Option 2">
                                        <option value="Option 3">
                                        <option value="Option 4">
                                        <option value="Option 5">
                                    </datalist>



                                    <button type="submit"
                                        class="bg-danger f-w-600 text-white border-0 px-4 py-1 rounded">Reject</button>
                                </form>

                            </div>
                            @endif
                        </td>


                        <td class="px-6 py-1 whitespace-no-wrap">
                            <a href="{{ route('view.pdf', ['fileName' => $document->document_name]) }}" target="_blank"
                                class="text-blue-500 hover:underline">
                                View
                            </a>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-lg text-gray-600">No documents found for this user.</p>
        @endif
    </div>
</div>
@endsection