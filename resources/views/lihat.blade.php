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
			{{$id->hari}}
			<th>Kamar</th>
			<th>Jenis</th>
			<th>Harga/hari</th>
			<th>Harga Total</th>
			<th>   </th>
		
		</tr>
		@foreach($kamar as $p)
		<tr>
			<td>{{ $p->ID_Kamar }}</td>
			<td>{{ $p->nama_JK}} </td>
			<td>{{ $p->harga_JK}}</td>
			<td>{{ $p->harga_JK * $id->hari}}</td>
			<td> <a href="/pelanggan/tambah/{{$p->ID_Kamar }}"> Pesan </a> </td>
		</tr>
		@endforeach
	</table>


</body>
</html>