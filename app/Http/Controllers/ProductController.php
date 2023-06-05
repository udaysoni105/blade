<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
/**@ author :#### ####
 * class name : ProductController
 * create a new controller for doing operation on product module.
 **/
class ProductController extends Controller
{
    /**@ author :#### ####
     * method name index
     * return welcome page
     * **/
    public function index()
    {
        return view('welcome');
    }
    /**@ author :#### ####
     * method name index
     * return welcome page
     * method name getProduct
     * latest data table show yajra and last edit and delete button add
     * @param yajra databse show and edit and delete button create manually
     **/
    public function getProduct(Request $request)
    {
        if ($request->ajax()) {
            $data = product::latest()->get();

            return DataTables::of($data)
                ->addColumn('action', function ($row) {

                    $editbtn = '<a href="' . url('/product/edit', $row->id) . '"><button class="btn btn-primary">Edit</button></a>'; //                  
                    $deleteButton = "<button class='btn btn-sm btn-danger delete' data-id='" . $row->id . "'><i class='fa-solid fa-trash'></i>Delete</button>";
                    return $editbtn . " " . $deleteButton;
                })
                ->make();
        }
    }

    /**@ author :#### ####
     * method name form
     * return form page
     **/
    public function form()
    {
        return view('form');
    }

    /**@ author :#### ####
     * method name store
     * @param validator
     * @param validation chacking if data is validate 
     **/
    public function store(Request $request)
    {
        return DB::transaction(function() use ($request) {
            info("inside store");

            $product = new product();
            $rules = $product->rules();

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            try {
                $validatedData = $request->validate($rules);
                $product = product::create($validatedData);

                if ($product) {
                    return redirect('/')->with('success', 'product created successfully.');
                } else {
                    throw new \Exception('Failed to create product.');
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
            }
        });
    }


    /**@ author :#### ####
     * method name show 
     * user find product is not available show product not found
     * if show items is avai;lable showing items
     * @param edit function is check product is find and show other product not found
     **/
    public function show(Request $request, $id)
    {
        return DB::transaction(function() use ($request,$id) {
            $product = product::find($id);

            if (!$product) {

                abort(404, 'product not found');
            }

            return view('show', compact('product'));
            //return view('product.show', compact('product'));
        });
    }

    /**@ author :#### ####
     * method name update 
     * if change items inside update will be in update function work
     * @param {string} Name - the name of product.
     * @param {text} Description - the description of product.
     * @param {string} SKU - the sku of unique bumber generate.
     * @param {integer} instock_Quantity - the instock_Quantity is available stock.
     * @param {decimal} regular_price - the regular price is show price.
     * @param {decimal} sale_price - the sale price check is show sale price.
     * @param {boolean} active - yes(1)|no(0)
     * @param {string} brand - is showing product brand name.
     * @param {string} category - category is showing product categorey.
     **/
    public function update(Request $request, product $product)
    {
        info("inside update");
        $product->Name = $request->input('Name');
        $product->Description = $request->input('Description');
        $product->SKU = $request->input('SKU');
        $product->instock_Quantity = $request->input('instock_Quantity');
        $product->regular_price = $request->input('regular_price');
        $product->sale_price = $request->input('sale_price');
        $product->active = $request->input('active');
        $product->Brand = $request->input('Brand');
        $product->category = $request->input('category');

        $product->save();

        return redirect('/')->with('success', 'Product updated successfully.');
    }

    /**@ author :#### ####
     * method name edit 
     * change of any deatils yajra database this function and edit.blade.php so form
     * */
    public function edit(product $product)
    {
        info("inside edit");
        return view('edit', compact('product'));
    }

    /**@ author :#### ####
     * method name delete
     * @param find product and delete show 1 succes other 0 failed but product is not available show invalid error show.
     **/
     
     public function delete(Request $request, $id)
     {
         return DB::transaction(function () use ($request, $id) {
             $id = $request->input('id');
             Log::info("Delete request received for ID: " . $id);
             
             $data = Product::find($id);
         
             if ($data) {
                 if ($data->delete()) {
                     $response['success'] = 1;
                     $response['msg'] = 'Record deleted.';
                     Log::info("Record with ID " . $id . " deleted successfully.");
                 } else {
                     $response['success'] = 0;
                     $response['msg'] = 'Failed to delete record.';
                     Log::warning("Failed to delete record with ID: " . $id);
                 }
             } else {
                 $response['success'] = 0;
                 $response['msg'] = 'Invalid ID.';
                 Log::error("Invalid ID: " . $id);
             }
             
             return response()->json($response);
         });
     }     
}
