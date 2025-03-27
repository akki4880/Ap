@extends('user-dashboard.layout.master')

@section('title', 'ALL Documents')

@section('content')

@section('main_breadcrumb', 'Home')

@section('breadcrumb', 'ALL Documents')
<div class=" ">
    <div class=" ">
        <div class="rounded-4 bg-white  ">
            <div class="px-2 py-5">
                <p class=" fw-bold fs-4 px-4">Welcome, {{ $user->name }}!</p>
                <div class="d-flex flex-wrap px-5 gap-5">
                    <p class="fs-5"><span class="f-w-700">Property Name:</span>
                        {{ $user->property->Property ?? 'N/A' }}</p>
                    <p class="fs-5"><span class="f-w-700">Unit No: </span>{{ $user->UnitNo }}</p>
                    <p class="fs-5"><span class="f-w-700">Family Size: </span>{{ count($familyMembers) }}
                    </p>
                </div>
                <h3 class=" px-4 mt-4">Upload Family Members Documents</h3>
                <div class="card-body">
                    <div class="accordion dark-accordion" id="outlineaccordion">
                        @forelse($familyMembers as $index => $familyMember)
                        <div class="accordion-item accordion-wrapper accordion-left-border">
                            <h2 class="accordion-header" id="outlineaccordionone">
                                <button class="accordion-button collapsed accordion-light-primary text-primary"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#left-collapseOne{{$index}}"
                                    aria-expanded="true" aria-controls="left-collapseOne">
                                    {{ $familyMember->firstName }}
                                    {{ $familyMember->lastName }}<i
                                        class="iconly-Arrow-Down-2 icli ms-auto icon"></i></button>
                            </h2>
                            <div class="accordion-collapse collapse" id="left-collapseOne{{$index}}"
                                aria-labelledby="outlineaccordionone" data-bs-parent="#outlineaccordion{{$index}}">
                                <div class="accordion-body">
                                    <div class="mb-6">
                                        <h2 class=" "> {{ $familyMember->firstName }}
                                            Details</h2>
                                        <div class=" ">
                                            <table class="min-w-full">
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    <tr>
                                                        <td class="px-4 py-2 whitespace-no-wrap"><strong>Name:</strong>
                                                        </td>
                                                        <td class="px-4 py-2 whitespace-no-wrap">
                                                            {{ $familyMember->firstName }} {{ $familyMember->lastName }}
                                                        <td class="px-4 py-2 whitespace-no-wrap">
                                                            <strong>Relation:</strong>
                                                        </td>
                                                        <td class="px-4 py-2 whitespace-no-wrap">
                                                            {{ $familyMember->Relation }}
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td class="px-4 py-2 whitespace-no-wrap">
                                                            <strong>Property:</strong>
                                                        </td>
                                                        <td class="px-4 py-2 whitespace-no-wrap">
                                                            {{ $familyMember->Code }}
                                                        <td class="px-4 py-2 whitespace-no-wrap"><strong>UnitNo</strong>
                                                        </td>
                                                        <td class="px-4 py-2 whitespace-no-wrap">
                                                            {{ $familyMember->UnitNo}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-4 py-2 whitespace-no-wrap"><strong>Date of
                                                                Birth:</strong></td>
                                                        <td class="px-4 py-2 whitespace-no-wrap">
                                                            {{ $familyMember->dob }}
                                                        </td>
                                                        <td class="px-4 py-2 whitespace-no-wrap"><strong>Age:</strong>
                                                        </td>
                                                        <td class="px-4 py-2 whitespace-no-wrap">
                                                            @php
                                                            $age = \Carbon\Carbon::parse($familyMember->dob)->age;
                                                            $status = $age < 18 ? 'Minor' : 'Adult' ; @endphp {{ $age }}
                                                                years old - {{ $status }} </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    @if(isset($documentsByFamilyMember[$familyMember->id]))
                                    <div class="overflow-x-auto">
                                        <table class="w-full table-auto">
                                            <thead>
                                                <tr>
                                                    <th class="ps-2 py-2">Document Number</th>
                                                    <th class="ps-2 py-2">Document Name</th>
                                                    <th class="ps-2 py-2">Upload</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach(range(1, 30) as $documentNumber)
                                                @php
                                                $document = $documentsByFamilyMember[$familyMember->id]['documents']
                                                ->where('document_number', $documentNumber)->first();
                                                @endphp

                                                <tr
                                                    class="{{ $loop->iteration % 2 === 0 ? 'bg-gray-50' : 'bg-white' }}">
                                                    <td class="border px-4 py-2">{{ $documentNumber }}</td>
                                                    <td class="border px-4 py-2">
                                                        {{ $documentNames[$documentNumber - 1] }}
                                                    </td>
                                                    <td class="border px-4 py-2">
                                                        @if($document && $document->document_name)
                                                        <div class="flex items-center">
                                                            <span class="mr-2 text-green-500">Uploaded
                                                                Successfully!!</span>
                                                            <a href="{{ route('view.pdf', ['fileName' => $document->document_name]) }}"
                                                                target="_blank"
                                                                class="text-blue-500 hover:underline">View</a>

                                                        </div>
                                                        @else
                                                        <form class="upload-form d-flex items-center"
                                                            enctype="multipart/form-data">
                                                            @csrf 

                                                            <input type="hidden" name="family_member_id"
                                                                value="{{ $familyMember->id }}">
                                                            <input type="hidden" name="document_number"
                                                                value="{{ $documentNumber }}">
                                                            <div class="input-group">
                                                                <input class="form-control" name="document"
                                                                    type="file"  accept="application/pdf" required>
                                                                <button class="btn btn-outline-primary rounded-start-0"
                                                                    id="inputGroupFileAddon04"
                                                                    type="submit">Upload</button>
                                                            </div> 
                                                        </form>
                                                        <div id="uploadStatus" class="d-none ml-2 flex items-center">
                                                            <label class="text-success">Uploaded
                                                                Successfully!!</label>
                                                        </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                    @else
                                    <p class="mt-2">No documents found for this family member.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="mt-4">No family members found.</p>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
document.querySelectorAll('.upload-form').forEach(form => {
    form.addEventListener('submit', async (e) => {
        e.preventDefault(); // Prevent default form submission

        const formData = new FormData(form);

        try {
            const response = await fetch('{{ route("upload.document") }}', {
                method: 'POST',
                body: formData
            });

            if (response.ok) {
                const responseData = await response.json();
                handleSuccess(responseData.message, form);
            } else {
                handleError();
            }
        } catch (error) {
            console.error('Error occurred during document upload:', error);
            handleError();
        }
    });
});

function handleSuccess(message, form) {
    // Hide the form
    form.style.display = 'none';
    // Show the upload status div
    document.getElementById('uploadStatus').classList.remove('d-none');
    // Display the success message
    showSuccessToast(message);
}

function handleError() {
    alert('An error occurred during document upload. Please try again.');
}

// Function to show success toast notification
function showSuccessToast(message) {
    // Display the toast notification
    $('.alert-toast').find('.toast-message').text(message);
    $('.alert-toast').show();
    // Call the hideToastWithAnimation function after 10 seconds (10000 milliseconds)
    setTimeout(hideToastWithAnimation, 10000);
}

// Function to hide the toast with animation
function hideToastWithAnimation() {
    var toast = document.querySelector('.alert-toast');
    if (toast) {
        toast.classList.add('hide-toast-animation');
        setTimeout(function() {
            toast.style.display = 'none';
        }, 500); // Set a timeout to remove the element after the animation completes
    }
}
</script>


<!--Toast-->
<div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm" style="display: none;">
    <input type="checkbox" class="hidden" id="footertoast">
    <label
        class="close cursor-pointer flex items-start justify-between w-full p-2 bg-green-500 h-10 rounded shadow-lg text-white"
        title="close" for="footertoast">
        <span class="toast-message"></span>
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
            viewBox="0 0 18 18">
            <path
                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
            </path>
        </svg>
    </label>
</div>

@endsection