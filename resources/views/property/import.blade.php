    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Import Properties</div>

                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form action="{{ route('property.import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="file">Choose Excel File:</label>
                                <input type="file" name="file" class="form-control" accept=".xlsx, .xls">
                            </div>

                            <button type="submit" class="btn btn-primary">Import Properties</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>