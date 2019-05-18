<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
</head>
<body>
 
	<h3>Data Pelanggan</h3>
 
	<a href="/pelanggan"> Kembali</a>
	
	<br/>
	<br/>
 
	<form action="/pelanggan/store" method="post">
		{{ csrf_field() }}
		Nama <input type="text" name="nama" required="required"> <br/>
		KTP <input type="text" name="ktp" required="required"> <br/>
		Nomor HP <input type="text" name="nohp" required="required"> <br/>
		Alamat <input type="text" name="alamat" required="required"> <br/>
		Email <input type="text" name="email" required="required"> <br/>

		<input type="submit" value="Simpan Data">
	</form>
 
</body>
</html>