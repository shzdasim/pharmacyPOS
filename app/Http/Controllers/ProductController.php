<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'manufacturer', 'supplier')->paginate(20);
        return view('SetupModule.Products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        $suppliers = Supplier::all();

        return view('SetupModule.Products.create', compact('categories', 'manufacturers', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'formulation' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'product_barcode' => 'nullable|string',
            'pack_size' => 'required|numeric',
            'current_quantity' => 'nullable|numeric',
            'batch_number' => 'nullable|string',
            'pack_purchase_price' => 'nullable|numeric',
            'pack_avg_purchase_price' => 'nullable|numeric',
            'single_purchase_price' => 'nullable|numeric',
            'pack_sale_price' => 'nullable|numeric',
            'single_avg_sale_price' => 'nullable|numeric',
            'single_sale_price' => 'nullable|numeric',
            'location' => 'nullable|string',
            'narcotics_lock' => 'nullable|boolean',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
{
    // Fetch product details by ID
    //$product = Product::find($product);

    // Return the details (e.g., as JSON)
    return response()->json($product);
}


    public function edit(Product $product)
    {
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        $suppliers = Supplier::all();

        return view('SetupModule.Products.edit', compact('product', 'categories', 'manufacturers', 'suppliers'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'formulation' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'product_barcode' => 'nullable|string',
            'pack_size' => 'required|numeric',
            'current_quantity' => 'nullable|numeric',
            'batch_number' => 'nullable|string',
            'pack_purchase_price' => 'nullable|numeric',
            'pack_avg_purchase_price' => 'nullable|numeric',
            'single_purchase_price' => 'nullable|numeric',
            'pack_sale_price' => 'nullable|numeric',
            'single_avg_sale_price' => 'nullable|numeric',
            'single_sale_price' => 'nullable|numeric',
            'location' => 'nullable|string',
            'narcotics_lock' => 'nullable|boolean',
        ]);

        $requestData = $request->all();

        // If narcotics_lock is not present in the request, set it to 0 (unchecked)
        if (!$request->filled('narcotics_lock')) {
            $requestData['narcotics_lock'] = 0;
        }

        $product->update($requestData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->current_quantity > 0) {
            return redirect()->route('products.index')->with('error', 'Product with quantity cannot be deleted.');
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

    // Perform a case-insensitive search on the 'name' column
    $products = Product::where('name', 'like', '%' . $query . '%')->get();

    return response()->json($products);
    }

}
