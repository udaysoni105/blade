@extends('layout.master')

@section('edit')
    <style>
        .form-textarea {
            width: 100%;
            height: 50px;
        }
    </style>
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-4">Edit product</h2>
            <form method="POST" action="{{ route('product.update', $product->id) }}" class="mx-5">
                @csrf
                @method('PUT')

                <label for="Name">Name:</label>
                <textarea Name="Name" required class="form-textarea">{{ $product->Name }}</textarea><br><br>

                <label for="Description">Description:</label>
                <textarea Name="Description" required class="form-textarea">{{ $product->Description }}</textarea><br><br>

                <label for="SKU">SKU:</label>
                <textarea Name="SKU" required class="form-textarea">{{ $product->SKU }}</textarea><br><br>

                <label for="instock_Quantity">instock_Quantity:</label>
                <textarea Name="instock_Quantity" required class="form-textarea">{{ $product->instock_Quantity }}</textarea><br><br>

                <label for="regular_price">regular_price:</label>
                <textarea Name="regular_price" required class="form-textarea">{{ $product->regular_price }}</textarea><br><br>

                <label for="sale_price">sale_price:</label>
                <textarea Name="sale_price" required class="form-textarea">{{ $product->sale_price }}</textarea><br><br>

        </div>

        <div class="col-md-6">
            <label for="active">active:</label>
            <textarea Name="active" required class="form-textarea">{{ $product->active }}</textarea><br><br>

            <label for="Brand">Brand:</label>
            <textarea Name="Brand" required class="form-textarea">{{ $product->Brand }}</textarea><br><br>

            <label for="category">category:</label>
            <textarea Name="category" required class="form-textarea">{{ $product->category }}</textarea><br><br>

            <div class="col-md-6">
                <div class="form-group mt-2">
                    <label for="">Update Feature Image</label>
                    <input type="file" Name="image" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mt-2">
                    <label for="">Add More Images</label>
                    <input type="file" Name="image" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>
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
