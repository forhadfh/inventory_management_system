@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('purchase.add') }}" class="btn btn-inverse-info">Add Purchase</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Purchase All</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Sl</th>

                                        <th>Purchase no</th>
                                        <th>Date</th>
                                        <th>Supplier</th>
                                        <th>Category</th>
                                        <th>Product Nmae</th>
                                        <th>Qty</th>
                                        <th>U-price</th>
                                        <th>B-price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($allData as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            <td>{{ $item->purchase_no }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->date)) }}</td>
                                            <td>{{ $item['supplier']['name'] }}</td>
                                            <td>{{ $item['category']['name'] }}</td>

                                            <td>{{ $item['product']['name'] }}</td>
                                            <td>{{ $item->buying_qty }}</td>
                                            <td>{{ $item->unit_price }}</td>
                                            <td>{{ $item->buying_price }}</td>
                                            <td>
                                                @if ($item->status == '0')
                                                    <span class="btn btn-warning">Pending</span>
                                                @elseif ($item->status == '1')
                                                    <span class="btn btn-success">Approve</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if ($item->status == '0')
                                                    <a href="{{ route('purchase.delete', $item->id) }}"
                                                        class="btn btn-inverse-danger" id="delete" title="Delete"> <i
                                                            data-feather="trash-2"></i> </a>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
