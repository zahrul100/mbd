<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
</head>
<body>

	<h2>www.malasngoding.com</h2>
	<h3>Data Pegawai</h3>

	<a href="/pelanggan/tambah/"> + Tambah Pegawai Baru</a>
	
	<br/>
	<br/>

	<table border="1">
		<tr>{{$id->cekin}}
			{{$id->cekot}}
			{{$id->id}}
			<th>Kamar</th>
			<th>Jenis</th>
		
		</tr>
		@foreach($kamar as $p)
		<tr>
			<td>{{ $p->ID_Kamar }}</td>
			<td>{{ $p->ID_JK}} </td>

		</tr>
		@endforeach
	</table>


</body>
</html>