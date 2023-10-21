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

                        <h6 class="card-title">Add Supplier</h6>

                        <form id="myForm" method="POST" action="{{ route('supplier.store') }}" class="forms-sample">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="exampleInputUsername1" class="form-label">Supplier Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputUsername1" class="form-label">Supplier Mobile</label>
                                <input type="text" name="mobile_no" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputUsername1" class="form-label">Supplier Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputUsername1" class="form-label">Supplier Address</label>
                                <input type="text" name="address" class="form-control">
                            </div>









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

    {{-- validation --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    mobile_no: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },

                },
                messages: {
                    name: {
                        required: 'Please Enter  name',
                    },
                    mobile_no: {
                        required: 'Please Enter  mobile_no',
                    },
                    email: {
                        required: 'Please Enter  email',
                    },
                    address: {
                        required: 'Please Enter  address',
                    },


                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
