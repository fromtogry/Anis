<html>
<head>
  <title>Data Kendaraan Erajaya (by: Anis)</title>
		<!-- JQUERY -->
		<script type="text/javascript" language="javascript" src="assets/media/js/jquery.js"></script>
		
		<!-- BOOTSTRAP -->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
		
		<!-- Optional theme -->
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>
		
		<!-- DataTables -->
		<link rel="stylesheet" type="text/css" href="assets/media/css/dataTables.bootstrap.css">
		<link rel="stylesheet" type="text/css" href="assets/media/css/dataTables.responsive.css">
		<script type="text/javascript" language="javascript" src="assets/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="assets/media/js/dataTables.responsive.js"></script>
		<script type="text/javascript" language="javascript" src="assets/media/js/dataTables.bootstrap.js"></script>
		<script type="text/javascript" language="javascript" src="assets/media/js/common.js"></script>
		<script type="text/javascript" language="javascript" >
			
			var dTable;
			// #Example adalah id pada table
			$(document).ready(function() {
				dTable = $('#example').DataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"bJQueryUI": false,
					"responsive": true,
					"sAjaxSource": "serverSide.php", // Load Data
					"sServerMethod": "POST",
					"columnDefs": [
					{ "orderable": false, "targets": 0, "searchable": false },
					{ "orderable": true, "targets": 1, "searchable": true },
					{ "orderable": true, "targets": 2, "searchable": true },
					{ "orderable": true, "targets": 3, "searchable": true },
					{ "orderable": true, "targets": 4, "searchable": true }
					]
				} );
				
				$('#example').removeClass( 'display' ).addClass('table table-striped table-bordered');
				$('#example tfoot th').each( function () {
					
					//Agar kolom Action Tidak Ada Tombol Pencarian
					if( $(this).text() != "Action" ){
						var title = $('#example thead th').eq( $(this).index() ).text();
						$(this).html( '<input type="text" placeholder="Search '+title+'" class="form-control" />' );
					}
				} );
				
				// Untuk Pencarian, di kolom paling bawah
				dTable.columns().every( function () {
					var that = this;
					
					$( 'input', this.footer() ).on( 'keyup change', function () {
						that
						.search( this.value )
						.draw();
					} );
				} );
			} );
			
			
		</script>
</head>
<body>
<div class="container">
  <h2>Erajaya Group</h2>
  <p>Vehicle Management System</p>
  <ul class="nav nav-tabs">
    <li class="active"><a href="#home">Data Kendaraan</a></li>
    <li><a href="#menu1">Master Kendaraan</a></li>
    <li><a href="#menu2">Monitoring Kendaraan</a></li>
    <li><a href="#menu3">Menu 3</a></li>
  </ul>
  <div class="tab-content">
<!--  awal tab home -->
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
<!--  akhir tab home -->
<!--  awal tab menu1 -->
    <div id="menu1" class="tab-pane fade">
      <h3>Input Master Kendaraan</h3>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10">
					<button onClick="showModals()" class="btn btn-info">Tambah Data</button>
					<br>
					<hr>
					<br>
					<table id="example"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
						<thead>
							<tr>
								<th>ACTION</th>
								<th>NO.POLISI</th>
								<th>MERK</th>
								<th>MODEL</th>
								<th>WARNA</th>
								<th>PIC</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
						<tfoot>
							<th>ACTION</th>
							<th>NO.POLISI</th>
							<th>MERK</th>
							<th>MODEL</th>
							<th>WARNA</th>
							<th>PIC</th>
						</tfoot>
					</table>
				</div>
			</div>
		</div>	 

<!-- Modal Popup -->
		<div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Add Master</h4>
					</div>
					<div class="modal-body">
						
						<div class="alert alert-danger" role="alert" id="removeWarning">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Anda yakin ingin menghapus user ini
						</div>
						<br>
						<form class="form-horizontal" id="formUser">
							
							<input type="hidden" class="form-control" id="id" name="id">
							<input type="hidden" class="form-control" id="userid" name="userid">
							<input type="hidden" class="form-control" id="type" name="type">
							
							<div class="form-group">
								<label for="no_polisi" class="col-sm-2 control-label">Nomor Polisi</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="no_polisi" name="no_polisi" >
								</div>
							</div>
							<!--
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama User</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="real_name" name="real_name" >
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama User</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="real_name" name="real_name" >
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama User</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="real_name" name="real_name" >
								</div>
							</div>
							<div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama User</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="real_name" name="real_name" >
								</div>
							</div><div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama User</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="real_name" name="real_name" >
								</div>
							</div><div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama User</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="real_name" name="real_name" >
								</div>
							</div><div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama User</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="real_name" name="real_name" >
								</div>
							</div><div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama User</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="real_name" name="real_name" >
								</div>
							</div><div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama User</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="real_name" name="real_name" >
								</div>
							</div><div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama User</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="real_name" name="real_name" >
								</div>
							</div><div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama User</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="real_name" name="real_name" >
								</div>
							</div><div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama User</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="real_name" name="real_name" >
								</div>
							</div><div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama User</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="real_name" name="real_name" >
								</div>
							</div><div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama User</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="real_name" name="real_name" >
								</div>
							</div><div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama User</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="real_name" name="real_name" >
								</div>
							</div><div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama User</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="real_name" name="real_name" >
								</div>
							</div><div class="form-group">
								<label for="real_name" class="col-sm-2 control-label">Nama User</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="real_name" name="real_name" >
								</div>
							</div>
							-->
							<div class="form-group">
								<label for="merk_type" class="col-sm-2 control-label">MERK</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="merk_type" name="merk_type" >
								</div>
							</div>
							<div class="form-group">
								<label for="warna" class="col-sm-2 control-label">WARNA</label>
								<div class="col-sm-10">
									<textarea type="text" class="form-control" id="warna" name="warna" ></textarea>
								</div>
							</div>
						</form>
						
					</div>
					<div class="modal-footer">
						<button type="button" onClick="submitUser()" class="btn btn-default" data-dismiss="modal">Submit</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
<!-- akhir modal Popup -->		
	</div>
<!--  akhir tab menu1 -->
<!--  awal tab menu2 -->
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
<!--  akhir tab menu2 -->
<!--  awal tab menu3 -->
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
<!--  akhir tab menu3 -->
  </div>
    <hr>
    <p class="act"><b>Active Tab</b>: <span></span></p>
    <p class="prev"><b>Previous Tab</b>: <span></span></p>
</div>

<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
    $('.nav-tabs a').on('shown.bs.tab', function(event){
        var x = $(event.target).text();         // active tab
        var y = $(event.relatedTarget).text();  // previous tab
        $(".act span").text(x);
        $(".prev span").text(y);
    });
});
//Tampilkan Modal 
			function showModals( id )
			{
				waitingDialog.show();
				clearModals();
				
				// Untuk Eksekusi Data Yang Ingin di Edit atau Di Hapus 
				if( id )
				{
					$.ajax({
						type: "POST",
						url: "crud.php",
						dataType: 'json',
						data: {id:no_polisi,type:"get"},
						success: function(res) {
							waitingDialog.hide();
							setModalData( res );
						}
					});
				}
				// Untuk Tambahkan Data
				else
				{
					$("#myModals").modal("show");
					$("#myModalLabel").html("New Data");
					$("#type").val("new"); 
					waitingDialog.hide();
				}
			}
			
			//Data Yang Ingin Di Tampilkan Pada Modal Ketika Di Edit 
			function setModalData( data )
			{
				$("#myModalLabel").html(data.no_polisi);
				$("#id").val(data.no_polisi);
				$("#type").val("edit");
				$("#merk_type").val(data.merk_type);
				$("#model").val(data.model);
				$("#warna").val(data.warna);
				$("#no_rangka").val(data.no_rangka);
				$("#no_mesin").val(data.no_mesin);
				$("#no_bpkb").val(data.no_bpkb);
				$("#no_faktur").val(data.no_faktur);
				$("#stnk_atas_nama").val(data.stnk_atas_nama);
				$("#pt_pemakai").val(data.pt_pemakai);
				$("#pic").val(data.pic);
				$("#jabatan_struktural").val(data.jabatan_struktural);
				$("#tlp").val(data.tlp);
				$("#email").val(data.email);
				$("#divisi_pengguna").val(data.divisi_pengguna);
				$("#lokasi").val(data.lokasi);
				$("#propinsi").val(data.propinsi);
				$("#status_pembayaran").val(data.status_pembayaran);
				$("#tahun").val(data.tahun);
				$("#umur_kendaraan").val(data.umur_kendaraan);
			}
			
			//Submit Untuk Eksekusi Tambah/Edit/Hapus Data 
			function submitUser()
			{
				var formData = $("#formUser").serialize();
				waitingDialog.show();
				$.ajax({
					type: "POST",
					url: "crud.php",
					dataType: 'json',
					data: formData,
					success: function(data) {
						dTable.ajax.reload(); // Untuk Reload Tables secara otomatis
						waitingDialog.hide();	
					}
				});
			}
			
			//Hapus Data
			function deleteUser( id )
			{
				clearModals();
				$.ajax({
					type: "POST",
					url: "crud.php",
					dataType: 'json',
					data: {id:id,type:"get"},
					success: function(data) {
						$("#removeWarning").show();
						$("#myModalLabel").html("Delete User");
						$("#id").val(data.id);
						$("#userid").val(data.userid);
						$("#type").val("delete");
						$("#real_name").val(data.real_name).attr("disabled","true");
						$("#npm").val(data.npm).attr("disabled","true");
						$("#kelas").val(data.kelas).attr("disabled","true");
						$("#myModals").modal("show");
						waitingDialog.hide();			
					}
				});
			}
			
			//Clear Modal atau menutup modal supaya tidak terjadi duplikat modal
			function clearModals()
			{
				$("#removeWarning").hide();
				$("#id").val("").removeAttr( "disabled" );
				$("#userid").val("").removeAttr( "disabled" );
				$("#real_name").val("").removeAttr( "disabled" );
				$("#npm").val("").removeAttr( "disabled" );
				$("#type").val("");
				$("#kelas").val("").removeAttr( "disabled" );
			}

</script>

</body>
</html>
