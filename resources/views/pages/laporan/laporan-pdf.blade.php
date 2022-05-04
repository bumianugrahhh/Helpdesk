<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Pengaduan</title>
	<style>
		@page {
    		size: 21cm 32cm landscape;
    		margin: 5mm 15mm 0px 15mm;

  		}
  		footer {
  			text-align: center;
  		}
  		.header{
  			text-align: center;
  			position: fixed;
  			top: 0;
  		}
  		content{
  			text-align: justify; font-family: Arial; font-size: 14px; 
  		}
  		@media print{
  			
  		}
  		.center {
  			display: block;
  			padding-top: 5px;
  			width: 25%;
		}
		ul {
			list-style-type: none;
		}
		ul li:before{
			content: '-';
			position: absolute;
			margin-left: -20px;
		}
		body{
			margin: 0px;
		}

		#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 5px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 5px;
  padding-bottom: 5px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
  </style>
</head>
<body>
	<div class="header">
		<table width="100%" border="0">
			<tr>
				<td width="20%"><img src="{{asset('public/asset/img/fajarlogo.jpeg')}}" width="40%"></td>
				<td style="text-align: center; vertical-align: middle;"><span style=" font-size: 20px; font-weight: bold;">FAJAR TECHNO & SYSTEM BROADBAND</span><br>
					<span style="font-family: Arial; font-weight: bold; font-size: 20px">MAKASSAR INDONESIA</span><br>
					<span style="text-align: justify; font-size: 14px; font-weight: bold;">Graha Pena, Jl. Urip Sumoharjo No. 20, Pampang, Kec. Panakukang, Kota Makassar, Sulawesi Selatan 90231 </span>
				</td>
				<td width="19%"></td>
			</tr>
		</table>
		<hr style="border-bottom: 3px solid #000000; margin: 0px; padding: 0px">
	</div>
	<div style="text-align: justify; font-family: arial; font-size: 13px; page-break-after: always; margin-top: 90px"><br>
		<p>Tanggal dicetak : <?=date('d/m/Y')?><center><h2>Laporan Data Pengaduan</h2></center></p>
		<table width="100%" align="center" id="customers">
			<thead>
				<tr>
					<th width="1%" style="white-space: nowrap; ">No.</th>
					<th width="1%" style="white-space: nowrap;">Nama Instansi</th>
					<th width="1%" style="white-space: nowrap;">Tgl. Pengaduan</th>
					<th>Judul</th>
					<th>Isi</th>
					<th width="1%" style="white-space: nowrap;">Status</th>
				</tr>
			</thead>
			<?php $no=1;?>
			@if($laporan->isEmpty())
			<tr>
				<td colspan="6" style="text-align: center;"><i>Data tidak tersedia</i></td>
			</tr>
			@else
			@foreach($laporan as $r)
			<tr>
				<td style="white-space: nowrap; text-align: center;"><?=$no++;?></td>
				<td style="white-space: nowrap;">{{$r->nama_instansi}}</td>
				<td style="white-space: nowrap; text-align: center;"><?=date('d-m-Y',strtotime($r->tgl_pengaduan))?></td>
				<td>{{$r->judul_pengaduan}}</td>
				<td>{{$r->isi_pengaduan}}</td>
				<td style="white-space: nowrap; text-align: center;">{{$r->status_pengaduan}}</td>
			</tr>
			@endforeach
			@endif
		</table>
		
	</div>
</body>
</html>
