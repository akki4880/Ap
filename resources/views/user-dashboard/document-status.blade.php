@extends('user-dashboard.layout.master')

@section('title', 'Document Status')

@section('content')

@section('main_breadcrumb', 'Home')

@section('breadcrumb', 'Document Status')
<div class="container-fluid">
    <div class="row project-cards">
        <div class="col-md-12 project-list">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active " id="top-home-tab" data-bs-toggle="tab"
                                    href="#top-home" role="tab" aria-controls="top-home" aria-selected="true"><i
                                        data-feather="clock"></i>Pending</a></li>
                            <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab"
                                    href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false"><i
                                    data-feather="check-circle"></i></i>Approved</a></li>
                            <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab"
                                    href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i
                                        data-feather="x-circle"></i>Rejected</a></li>
                        </ul>
                    </div> 
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-home" role="tabpanel"
                            aria-labelledby="top-home-tab">
                            @include('user-dashboard.partials.document-status-tab', ['status' => 'pending'])
                        </div>
                        <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                            @include('user-dashboard.partials.document-status-tab', ['status' => 'verified'])
                        </div>
                        <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                            @include('user-dashboard.partials.document-status-tab', ['status' => 'rejected'])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection