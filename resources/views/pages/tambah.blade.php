<!DOCTYPE html>
<html>
<head>
	<title>tambah product</title>
</head>
<body>
 
	
	<h3>Tambah product</h3>
 
	<a href="/product"> Kembali</a>
	
	<br/>
	<br/>
 
	<form action="/product/store" method="post">
		{{ csrf_field() }}
		Nama <input type="text" name="nama"> <br/>
		Category <input type="number" name="category"> <br/>
		Product code  <input type="number" name="product_code"> <br/>
		Description <textarea name="Desceription"></textarea> <br/>
        Price <input type="number" name="price"> <br/>
        Stock <input type="number" name="stock"> <br/>
		<input type="submit" value="Simpan Data">
	</form>
		
 
 
</body>
</html>