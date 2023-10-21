@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">


        <div class="row profile-body">
            <!-- left wrapper start -->

            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Edit sullpier</h6>

                        <form id="myForm" method="POST" action="{{ route('sullpier.update') }}" class="forms-sample">
                            @csrf

                            <input type="hidden" name="id" value="{{ $supplier->id }}">

                            <div class="form-group mb-3">
                                <label for="exampleInputUsername1" class="form-label">Supplier Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $supplier->name }}">

                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputUsername1" class="form-label">Supplier Mobile</label>
                                <input type="text" name="mobile_no" class="form-control"
                                    value="{{ $supplier->mobile_no }}">

                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputUsername1" class="form-label">Supplier Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $supplier->email }}">

                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputUsername1" class="form-label">Supplier Address</label>
                                <input type="text" name="address" class="form-control" value="{{ $supplier->address }}">

                            </div>









                            <button type="submit" class="btn btn-primary me-2">Save Change </button>

                        </form>

                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->
            <div class="d-none d-xl-block col-xl-3">

            </div>
            <!-- right wrapper end -->
        </div>

    </div>
@endsection
