<!DOCTYPE html>
<html>
<head>
	<title>edit product</title>
</head>
<body>
 
	
	<h3>Edit product</h3>
 
	<a href="/product"> Kembali</a>
	
	<br/>
	<br/>
 
	@foreach($product as $p)
	<form action="/product/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $p->product_id }}"> <br/>
		Nama product <input type="text" required="required" name="nama" value="{{ $p->product_nama }}"> <br/>
		Category <input type="number" required="required" name="category" value="{{ $p->product_category }}"> <br/>
		Product code <input type="number" required="required" name="product_code" value="{{ $p->product_code }}"> <br/>
		Description <textarea required="required" name="description">{{ $p->product_description }}</textarea> <br/>
        Price <input type="number" required="required" name="price" value="{{ $p->product_price }}"> <br/>
        Stock <input type="number" required="required" name="stock" value="{{ $p->product_stock }}"> <br/>
		<input type="submit" value="Simpan Data">
	</form>
	@endforeach
		
</body>
</html>