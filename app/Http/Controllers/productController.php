<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
	public function index()
	{
		// mengambil data dari tabel products
		$products = DB::table('products')->get();

		// mengirim data products ke view index
		return view('pages.index', compact('products'));
	}

	// method untuk menampilkan view form tambah products
	public function tambah()
	{
		// memanggil view tambah
		return view('pages.tambah');
	}

	// method untuk insert data ke tabel products
	public function store(Request $request)
	{
		// insert data ke tabel products
		DB::table('products')->insert([
			'products_name' => $request->input('nama'),
			'products_category' => $request->input('category_id'),
			'products_code' => $request->input('products_code'),
			'products_description' => $request->input('description'),
			'products_price' => $request->input('price'),
			'products_stock' => $request->input('stock'),
		]);

		// alihkan halaman ke halaman products
		return redirect('/products');
	}

	// method untuk edit data products
	public function edit($id)
	{
		// mengambil data products berdasarkan id yang dipilih
		$products = DB::table('products')->where('products_id', $id)->get();

		// passing data products yang didapat ke view edit.blade.php
		return view('edit', compact('products'));
	}

	// update data products
	public function update(Request $request)
	{
		// update data products
		DB::table('products')->where('products_id', $request->input('id'))->update([
			'products_name' => $request->input('nama'),
			'products_category' => $request->input('category_id'),
			'products_code' => $request->input('products_code'),
			'products_description' => $request->input('description'),
			'products_price' => $request->input('price'),
			'products_stock' => $request->input('stock'),
		]);

		// alihkan halaman ke halaman products
		return redirect('/products');
	}

	// method untuk hapus data products
	public function hapus($id)
	{
		// menghapus data products berdasarkan id yang dipilih
		DB::table('products')->where('products_id', $id)->delete();

		// alihkan halaman ke halaman products
		return redirect('/products');
	}
}
