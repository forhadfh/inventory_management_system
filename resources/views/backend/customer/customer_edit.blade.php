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

                        <h6 class="card-title">Add Customer</h6>

                        <form id="myForm" method="POST" action="{{ route('customer.update') }}"
                            enctype="multipart/form-data" class="forms-sample">
                            @csrf
                            <input type="hidden" name="id" value="{{ $customer->id }}">
                            <input type="hidden" name="old_image" value="{{ $customer->customer_image }}">

                            <div class="form-group mb-3">
                                <label for="exampleInputUsername1" class="form-label">Customer Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $customer->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputUsername1" class="form-label">Customer Mobile</label>
                                <input type="text" name="mobile_no" class="form-control"
                                    value="{{ $customer->mobile_no }}">
                            </div>
                            <div class="form-group
                                    mb-3">
                                <label for="exampleInputUsername1" class="form-label">Customer Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $customer->email }}">
                            </div>
                            <div class="form-group
                                    mb-3">
                                <label for="exampleInputUsername1" class="form-label">Customer Address</label>
                                <input type="text" name="address" class="form-control" value="{{ $customer->address }}">
                            </div>

                            {{-- photo --}}
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Customer Image</label>
                                <input class="form-control" name="customer_image" type="file" id="image">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label"></label>
                                <img id="showImage" class="wd-70 rounded-circle"
                                    src="{{ asset($customer->customer_image) }}" alt="profile">
                            </div>
                            {{-- photo --}}









                            <button type="submit" class="btn btn-primary me-2">Save </button>

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



    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
