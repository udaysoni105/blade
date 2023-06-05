@extends('layout.master')
@section('yajra')

    <head>
        <title>Laravel </title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container mt-5">
            <h2 class="mb-4">View Product</h2>
            <table class="table table-bordered yajra-datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>SKU</th>
                        <th>regular_price</th>
                        <th>sale_price</th>
                        <th>active</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('get.product') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'Name',
                        name: 'Name'
                    },
                    {
                        data: 'Description',
                        name: 'Description'
                    },
                    {
                        data: 'SKU',
                        name: 'SKU'
                    },
                    {
                        data: 'regular_price',
                        name: 'regular_price'
                    },
                    {
                        data: 'sale_price',
                        name: 'sale_price'
                    },
                    {
                        data: 'active',
                        name: 'active'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

            $('body').on('click', '.edit', function() {
                var id = $(this).data("id");
                window.location.href = "{{ url('product') }}" + "/" + "/edit" + id;
            });

            $('body').on('click', '.delete', function() {
                var id = $(this).data('id');
                console.log(id);
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                var deleteConfirm = confirm("Are you sure?");
                if (deleteConfirm == true) {
                    // AJAX request
                    $.ajax({
                        url: "{{ url('product/delete') }}/" + id,
                        type: 'post',
                        data: {
                            _token: CSRF_TOKEN,
                            id: id
                        },
                        success: function(response) {
                            try {
                                if (response.success == 1) {
                                    alert("Record deleted.");

                                    // Reload DataTable
                                    table.ajax.reload();
                                } else {
                                    alert("Invalid ID.");
                                }
                            } catch (error) {
                                alert("An error occurred: " + error);
                            }
                        },
                        error: function(xhr, status, error) {
                            alert("An error occurred while deleting the record: " + error);
                        }
                    });
                }
            });
        });
    </script>
@endsection
