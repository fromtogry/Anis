<?php
//Connection Database
	$con = mysqli_connect("localhost","root","admin","vehicle");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	switch ($_POST['type']) {
		
//Tampilkan Data 
		case "get":
			
			$SQL = mysqli_query($con, "SELECT * FROM mobil WHERE no_polisi='".$_POST['no_polisi']."'");
			$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
			echo json_encode($return);
			break;
		
//Tambah Data	
		case "new":
			
			$SQL = mysqli_query($con, 
									"INSERT INTO mobil SET 
										no_polisi='".$_POST['no_polisi']."', 
										merk_type='".$_POST['merk_type']."', 
										model='".$_POST['model']."', 
										warna='".$_POST['warna']."', 
										no_rangka='".$_POST['no_rangka']."', 
										no_mesin='".$_POST['no_mesin']."', 
										no_bpkb='".$_POST['no_bpkb']."', 
										no_faktur='".$_POST['no_faktur']."', 
										stnk_atas_nama='".$_POST['stnk_atas_nama']."', 
										pt_pemakai='".$_POST['pt_pemakai']."', 
										pic='".$_POST['pic']."', 
										jabatan_struktural='".$_POST['jabatan_struktural']."', 
										tlp='".$_POST['tlp']."', 
										email='".$_POST['email']."', 
										divisi_pengguna='".$_POST['divisi_pengguna']."', 
										lokasi='".$_POST['lokasi']."', 
										propinsi='".$_POST['propinsi']."', 
										status_pembayaran='".$_POST['status_pembayaran']."', 
										tahun='".$_POST['tahun']."', 
										umur_kendaraan='".$_POST['umur_kendaraan']."'
								");
			if($SQL){
				echo json_encode("OK");
			}
			break;
			
//Edit Data	
		case "edit":
			
			$SQL = mysqli_query($con, 
									"UPDATE mobil SET 
										merk_type='".$_POST['merk_type']."', 
										model='".$_POST['model']."', 
										warna='".$_POST['warna']."', 
										no_rangka='".$_POST['no_rangka']."', 
										no_mesin='".$_POST['no_mesin']."', 
										no_bpkb='".$_POST['no_bpkb']."', 
										no_faktur='".$_POST['no_faktur']."', 
										stnk_atas_nama='".$_POST['stnk_atas_nama']."', 
										pt_pemakai='".$_POST['pt_pemakai']."', 
										pic='".$_POST['pic']."', 
										jabatan_struktural='".$_POST['jabatan_struktural']."', 
										tlp='".$_POST['tlp']."', 
										email='".$_POST['email']."', 
										divisi_pengguna='".$_POST['divisi_pengguna']."', 
										lokasi='".$_POST['lokasi']."', 
										propinsi='".$_POST['propinsi']."', 
										status_pembayaran='".$_POST['status_pembayaran']."', 
										tahun='".$_POST['tahun']."', 
										umur_kendaraan='".$_POST['umur_kendaraan']."'
									WHERE no_polisi='".$_POST['no_polisi']."'
								");
			if($SQL){
				echo json_encode("OK");
			}			
			break;
			
//Hapus Data	
		case "delete":
			
			$SQL = mysqli_query($con, "DELETE FROM mobil WHERE no_polisi='".$_POST['no_polisi']."'");
			if($SQL){
				echo json_encode("OK");
			}			
			break;
	} 
	
?>