<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Data ditemukan',
            'data' => $products,
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data ditemukan',
                'data' => $product,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
                'data' => null,
            ], 404);
        }
    }

    public function store(Request $request)
    {
        // return response()->json([
        //     $request->all()
        // ]);
        $validate = Validator::make($request->all(), [
            'product_name' => 'required',
            'category_id' => 'required',
            'product_code' => 'required',
            'description' => 'required',
            'price' => 'required',
            'unit' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak valid',
                'data' => null,
            ], 422);
        }

        $product = Product::create([
            'product_name' => $request->input('product_name'),
            'category_id' => $request->input('category_id'),
            'product_code' => $request->input('product_code'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'unit' => $request->input('unit'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data telah dibuat',
            'data' => $product,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validate = Validator::make($request->all(), [
            'product_name' => 'required',
            'category_id' => 'required',
            'product_code' => 'required',
            'description' => 'required',
            'price' => 'required',
            'unit' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak valid',
                'data' => $validate->errors(),
            ], 422);
        }

        // Cari produk berdasarkan ID
        $product = Product::find($id);

        // Jika produk tidak ditemukan
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Produk tidak ditemukan',
                'data' => null,
            ], 404);
        }

        // Update data produk
        $product->update([
            'product_name' => $request->input('product_name'),
            'category_id' => $request->input('category_id'),
            'product_code' => $request->input('product_code'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'unit' => $request->input('unit'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data telah diperbarui',
            'data' => $product,
        ]);
    }

    public function destroy($id)
    {
        // Cari produk berdasarkan ID
        $product = Product::find($id);

        // Jika produk tidak ditemukan
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Produk tidak ditemukan',
                'data' => null,
            ], 404);
        }

        // Hapus produk
        $product->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data telah dihapus',
            'data' => $product,
        ]);
    }
}
