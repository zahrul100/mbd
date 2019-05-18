<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
</head>
<body>
 
 
	<a href="/pelanggan"> Kembali</a>
	
	<br/>
	<br/>
 
	<form action="/pelanggan/lihat" method="post">
		{{ csrf_field() }}
		Pilih Tanggal : <br/>
		Checkin <input type="date" name="cekin" required="required"> <br/>
		Checkout <input type="date" name="cekot" required="required"> <br/>

		<input type="submit" value="Cek">
	</form>
 
</body>
</html>