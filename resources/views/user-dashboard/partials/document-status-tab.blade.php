<div class="mt-3">
    <h4 class="text-lg font-semibold text-gray-800">{{ ucfirst($status) }} Documents</h4>

    <div class="table-responsive signal-table">
        <table class="table table-hover">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="">
                        Family Member
                    </th>
                    <th scope="col"
                        class="">
                        Document
                    </th>
                    <th scope="col"
                        class="">
                        Status
                    </th>
                    <th scope="col"
                        class="">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($familyMembers as $familyMember)
                @php
                $documents = $documentsByFamilyMember[$familyMember->id]['documents']->where('status', $status);
                @endphp
                @if($documents->isNotEmpty())
                @foreach($documents as $document)
                <tr>
                    <td class=" ">
                        <div class="text-sm font-medium text-gray-900">{{ $familyMember->name }}
                            {{ $familyMember->firstName }} {{ $familyMember->lastName }}</div>
                    </td>
                    <td class=" ">
                        <div
                            class="text-sm text-gray-900 overflow-hidden overflow-ellipsis whitespace-normal max-w-full">
                            {{ \Illuminate\Support\Str::words(App\Models\Document::$documentNames[$document->document_number - 1], 50, '...') }}
                        </div>
                    </td>
                    <td class=" ">
                        <span class="px-2 f-w-700 rounded-5
                                        @if($document->status === 'verified') bg-success text-white
                                        @elseif($document->status === 'rejected') bg-danger text-white
                                        @else text-bg-warning text-white @endif">
                            {{ ucfirst($document->status === 'verified' ? 'approved' : $document->status) }}
                        </span>
                    </td>
                    <td class="  text-sm text-gray-500">
                        @if($document->status === 'rejected')
                        <!-- Rejected Comments -->
                        <div class="text-red-600 font-semibold mt-2">{{ $document->comments }}</div>
                        <!-- Re-upload form for rejected documents -->
                        <form method="post" action="{{ route('reupload.document') }}" enctype="multipart/form-data"
                            class="inline-block">
                            @csrf
                            <input type="file" name="document" required
                                class="py-1 px-2 border rounded @error('document') border-red-500 @enderror"
                                onchange="updateLabel()">
                            <input type="hidden" name="family_member_id" value="{{ $document->family_member_id }}">
                            <input type="hidden" name="document_number" value="{{ $document->document_number }}">
                            <input type="hidden" name="document_id" value="{{ $document->id }}">
                            <button type="submit"
                                class="btn btn-secondary">ReUpload</button>

                            @error('document')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </form>
                        @endif

                        @if($document && $document->document_name)
                        <div class="flex items-center">

                            <a href="{{ route('view.pdf', ['fileName' => $document->document_name]) }}" target="_blank"
                                class="text-blue-500 hover:underline">View Document</a>

                        </div>
                        @else
                        <h1>no document</h1>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
                @empty
                <tr>
                    <td colspan="4" class="  text-sm font-medium text-gray-500">No family
                        members found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>