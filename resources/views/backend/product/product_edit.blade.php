@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">


        <div class="row profile-body">
            <!-- left wrapper start -->

            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title"> Edit Product</h6>

                        <form id="myForm" method="POST" action="{{ route('product.update') }}" class="forms-sample">
                            @csrf

                            <input type="hidden" name="id" value="{{ $product->id }}">

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Product Name </label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Supplier Name </label>
                                <div class="col-sm-10">
                                    <select name="supplier_id" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>
                                        @foreach ($supplier as $supp)
                                            <option value="{{ $supp->id }}"
                                                {{ $supp->id == $product->supplier_id ? 'selected' : '' }}>
                                                {{ $supp->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Unit Name </label>
                                <div class="col-sm-10">
                                    <select name="unit_id" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>
                                        @foreach ($unit as $uni)
                                            <option value="{{ $uni->id }}"
                                                {{ $uni->id == $product->unit_id ? 'selected' : '' }}>
                                                {{ $uni->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- end row -->



                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Category Name </label>
                                <div class="col-sm-10">
                                    <select name="category_id" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>
                                        @foreach ($category as $cat)
                                            <option value="{{ $cat->id }}"
                                                {{ $cat->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- end row -->



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
