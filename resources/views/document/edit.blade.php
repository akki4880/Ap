@extends('admin.layout.master')

@section('title', 'Edit Document')

@section('content')

@section('main_breadcrumb', 'Home')

@section('breadcrumb', 'Edit Document')
<div class="py-8 px-4">
    <div class="bg-white rounded-lg shadow-md p-5">
        <h1 class="text-3xl font-bold mb-6"></h1>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('documents.update', $document->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="document_name" class="form-label">Document Name</label>
                @php
                $documentName = \App\Models\Document::getDocumentName($document->document_number);
                @endphp
                <input type="text" name="document_name" id="document_name" value="{{ $document->document_name }}"
                    class="form-control d-none">
                <input type="text" name="document_name_display" id="document_name_display" value="{{ $documentName }}"
                    class="form-control" readonly>
            </div>

            <!-- Dropdown for status -->
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select">
                    <option value="pending" {{ $document->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="verified" {{ $document->status === 'verified' ? 'selected' : '' }}>Verified</option>
                    <option value="rejected" {{ $document->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            <!-- Comments -->
            <div class="mb-3">
                <label for="comments" class="form-label">Comments (for rejected documents)</label>
                <textarea name="comments" id="comments" rows="3"
                    class="form-control">{{ $document->comments }}</textarea>
            </div>

            <!-- File Path -->
            <div class="mb-3">
                <label for="file_path" class="form-label">File Path</label>
                <input type="text" name="file_path" id="file_path" value="{{ $document->file_path }}"
                    class="form-control">
            </div>

            <!-- Buttons -->
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('documents.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>

    </div>
</div>
@endsection