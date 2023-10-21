@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">


        <div class="row profile-body">
            <!-- left wrapper start -->

            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Edit unit</h6>

                        <form id="myForm" method="POST" action="{{ route('unit.update') }}" class="forms-sample">
                            @csrf
                            <input type="hidden" name="id" value="{{ $unit->id }}">

                            <div class="form-group mb-3">
                                <label for="exampleInputUsername1" class="form-label"> Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $unit->name }}">
                            </div>




                            <button type="submit" class="btn btn-primary me-2">Update </button>

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
