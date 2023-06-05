@extends('layout.master')
@section('form')

    <body>
        <form method="POST" action="/form" class="mx-5" id="updateForm">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="Name">Name:</label>
                    <input type="text" Name="Name" required class="form-control" placeholder="samosa">
                    <div> @isset($data)
                        <div>{{ $data }}</div>
                    @else
                        <div>No data available</div>
                    @endisset
                </div>
                </div>
                <div class="col-md-6">
                    <label for="active">Active:</label>
                    <select Name="active" required class="form-control">
                        <option value="1">YES</option>
                        <option value="0">NO</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="Description">Description:</label>
                    <textarea Name="Description" required class="form-control" placeholder="samosa"></textarea>
                </div>

                <div class="col-md-6">
                    <label for="brand">Brand:</label>
                    <select Name="brand" required class="form-control">
                        <option value="">Select a brand</option>
                        <option value="Electronics">NIKE</option>
                        <option value="Clothing">desi Rasoi</option>
                        <option value="Home">Maharaja</option>
                        <option value="Sports">Raymond</option>
                        <option value="Books">Logitech</option>
                    </select>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="SKU">SKU:</label>
                    <input type="string" Name="SKU" required class="form-control" placeholder="samosa">
                </div>

                <div class="col-md-6">
                    <label for="category">category:</label>
                    <select Name="category" required class="form-control">
                        <option value="">Select a category</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Clothing">Clothing</option>
                        <option value="Home">Home</option>
                        <option value="Sports">Sports</option>
                        <option value="Books">Books</option>
                        <input type="text" id="categorySearch" class="form-control" placeholder="Search category" />
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="instock_Quantity">instock_Quantity:</label>
                        <input type="number" Name="instock_Quantity" class="form-control" placeholder="44.00">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="regular_price">Regular Price:</label>
                        <input type="number" Name="regular_price" required class="form-control" placeholder="50.00">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="sale_price">Sale Price:</label>
                        <input type="number" Name="sale_price" required class="form-control" placeholder="80.00">
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="">Update Feature Image</label>
                            <input type="file" Name="image" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="Tax96">Tax96:</label>
                        <input type="number" Name="Tax96" required class="form-control" placeholder="0.00">
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="">Add More Images</label>
                            <input type="file" Name="image" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <button id="cancelButton" type="button" class="btn btn-secondary">Cancel</button>
                    </div>
                    <div class="col-md-6 text-end">
                        <input id="updateButton" type="submit" class="btn btn-primary" value="Update">
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        // Handle cancel button click event
                        $('#cancelButton').click(function() {
                            // Redirect the user to a specific page
                            window.location.href = '/form';

                            // Or clear the form fields
                            $('#formId')[0].reset();
                        });
                    });
                </script>
        </form>
    @endsection
