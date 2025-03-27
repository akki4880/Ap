@extends('admin.layout.master')

@section('title', 'View Leads')

@section('content')

@section('main_breadcrumb', 'Home')

@section('breadcrumb', 'Users') 
<div class="px-4 ">
    <div class="bg-white rounded-lg shadow-md p-6 pb-5 rounded-4">
        <!-- Filter form -->
        <form method="get" action="{{ route('admin.dashboard') }}"
            class="row g-3 needs-validation custom-input tooltip-valid validation-forms p-4" novalidate="">
            <div class="col-md-4 position-relative">
                <label class="form-label" for="validationTooltip01">Property Name:</label>
                <select class="form-select" name="code" id="code" onchange="updateUnitNumbers()">
                    <option value="">All</option>
                    @foreach($codes as $code)
                    <option value="{{ $code }}" @if(session('selectedCode')==$code) selected @endif>
                        {{ $propertyNames[$code] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 position-relative">
                <label class="form-label" for="validationTooltip02">UnitNo:</label>
                <select class="form-select" name="unitNo" id="unitNo">
                    <option value="">All</option>
                    @foreach($unitNos as $unitNo)
                    <option value="{{ $unitNo }}" @if(session('selectedUnitNo')==$unitNo) selected @endif>
                        {{ $unitNo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4 d-flex align-items-end">
                <button class="btn btn-primary" type="submit"> Filter </button>
            </div>
        </form>
        <!-- List of users -->
        <div class="col-sm-12 px-5">
            <div class="card overflow-hidden">
                <div class="table-responsive signal-table">
                    <table class="table table-hover"> 
                        <tbody>
                        @foreach($users as $user)
                            <a href="{{ route('admin.showUserDocuments', ['family_member_id' => $user->id]) }}"
                                class="text-indigo-500 hover:text-indigo-700 block">
                                <tr>
                                    <th><img src="{{ asset('avatar.jpg') }}" alt="Triumph" class="rounded-5 me-3"
                                            style="width: 3%;">{{ $user->firstName }}
                                        {{ $user->lastName }}</th>

                                    <th>{{ $propertyNames[$user->Code] ?? 'N/A' }}({{$user->UnitNo}})</th>
                                </tr>
                            </a>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="px-5">
            <!-- Pagination links -->
            {{ $users->links('pagination::bootstrap-5') }} 
        </div>
        
    </div>
</div>

<script>
    function updateUnitNumbers() {
        var selectedCode = document.getElementById('code').value;
        var unitNoSelect = document.getElementById('unitNo');
        var unitNumbers = @json($unitNumbers); // Pass the available unit numbers from the controller

        // Clear existing options
        unitNoSelect.innerHTML = '';

        // Add 'All' option
        var allOption = document.createElement('option');
        allOption.value = '';
        allOption.text = 'All';
        unitNoSelect.add(allOption);

        // Add options based on the selected code
        if (selectedCode && unitNumbers[selectedCode]) {
            unitNumbers[selectedCode].forEach(function (unitNo) {
                var option = document.createElement('option');
                option.value = unitNo;
                option.text = unitNo;
                unitNoSelect.add(option);
            });
        }

        // Store selected code and unit number in session
        sessionStorage.setItem('selectedCode', selectedCode);
        sessionStorage.setItem('selectedUnitNo', unitNoSelect.value);
    }

    // Restore selected code and unit number on page load
    window.onload = function () {
        var selectedCode = sessionStorage.getItem('selectedCode');
        var selectedUnitNo = sessionStorage.getItem('selectedUnitNo');

        if (selectedCode) {
            document.getElementById('code').value = selectedCode;
            updateUnitNumbers(); // Update unit numbers based on the selected code
        }

        if (selectedUnitNo) {
            document.getElementById('unitNo').value = selectedUnitNo;
        }
    }
</script>
<!-- jquery-->
<script src="../assets/js/vendors/jquery/jquery.min.js"></script>

<!-- datatable-->
<script src="../assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<!-- page_datatable-->
<script src="../assets/js/js-datatables/datatables/datatable.custom.js"></script>
<!-- page_datatable-->
<script src="../assets/js/datatable/datatables/datatable.custom.js"></script>

@endsection