<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\view_data;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
	public function index(Request $request)
	{
		$search = $request->input('search', '');
		$limit = 6;

		$Product = Product::when($search, function ($query, $search) {
			$query->where('product_name', 'like', "%$search%")
				->orWhere('category_id', 'like', "%$search%")
				->orWhere('description', 'like', "%$search%");
		})
			->paginate($limit);

		return view('products.index', compact('Product', 'search'));
	}

	public function delete($id)
	{
		$id = (int)$id;

		$deleted = DB::table('products')
			->where('id', $id)
			->delete();

		if ($deleted) {
			// Successful deletion
			return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
		} else {
			// Failed deletion
			return redirect()->route('products.index')->with('error', 'Failed to delete product.');
		}
	}

	public function createForm()
	{
		$categories = ProductCategory::all();  // Mengambil semua kategori dari database

		return view('products.create', compact('categories'));
	}
	public function create(Request $request)
	{
		// Validasi formulir
		$request->validate([
			'product_name' => 'required|string',
			'category_id' => 'required|integer',
			'product_code' => 'required|string',
			'description' => 'required|string',
			'price' => 'required|numeric',
			'stock' => 'required|numeric',
			'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		// Proses data formulir
		$data = $request->only([
			'product_name',
			'category_id',
			'product_code',
			'description',
			'price',
			'stock',
		]);

		// Menangani upload gambar
		$imagePaths = [];
		if ($request->hasFile('product_image')) {
			foreach ($request->file('product_image') as $image) {
				$imagePath = $image->store('uploads', 'public');
				$imagePaths[] = $imagePath;
			}
		}

		// Menambahkan path gambar ke data sebagai string
		$data['image'] = json_encode($imagePaths);

		// Membuat produk menggunakan model Eloquent
		Product::create($data);

		return redirect()->route('products.index')->with('success', 'Produk berhasil dibuat.');
	}

	public function update(Request $request, $id)
	{
		// Validasi formulir
		$request->validate([
			'product_name' => 'required|string',
			'category_id' => 'required|integer',
			'product_code' => 'required|string',
			'description' => 'required|string',
			'price' => 'required|numeric',
			'stock' => 'required|numeric',
			'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		// Proses data formulir
		$data = $request->only([
			'product_name',
			'category_id',
			'product_code',
			'description',
			'price',
			'stock',
		]);

		// Mengupdate produk menggunakan model Eloquent
		$product = Product::find($id);

		// Menangani upload gambar hanya jika ada file yang diunggah
		if ($request->hasFile('product_image')) {
			// Menghapus gambar lama sebelum menyimpan yang baru
			$this->deleteProductImages($product);

			// Menangani upload gambar baru
			$imagePaths = [];
			foreach ($request->file('product_image') as $image) {
				$imagePath = $image->store('uploads', 'public');
				$imagePaths[] = $imagePath;
			}

			// Menambahkan path gambar ke data sebagai string
			$data['image'] = json_encode($imagePaths);
		}

		// Update produk
		$product->update($data);

		return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate.');
	}

	// Helper function to delete old product images
	private function deleteProductImages($product)
	{
		// Hapus gambar lama
		$oldImages = json_decode($product->image, true);
		foreach ($oldImages as $oldImage) {
			Storage::disk('public')->delete($oldImage);
		}
	}

	public function editForm($id)
	{
		$product = DB::table('products')
			->join('product_categories', 'products.category_id', '=', 'product_categories.id')
			->select('products.*', 'product_categories.category_name')
			->where('products.id', $id)
			->first();

		// Pastikan produk dengan ID yang diminta ada
		if (!$product) {
			return redirect()->route('products.index')->with('error', 'Produk tidak ditemukan.');
		}

		// Mengambil semua kategori produk
		$categories = ProductCategory::all();

		return view('products.edit', compact('product', 'categories'));
	}



	public function chart()
	{

		$totalProducts = Product::count();
		$totalCategories = ProductCategory::count();
		$totalPrice = Product::sum('price');
		$totalStock = Product::sum('stock');
		return view('products.chart', compact('totalProducts', 'totalCategories', 'totalPrice', 'totalStock'));
	}


	// Other methods (create, update, delete) can be implemented similarly
}
