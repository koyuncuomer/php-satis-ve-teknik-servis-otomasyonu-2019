<!-- footer content -->
<footer>
	<div class="pull-right">
		<a href="http://omerkoyuncu.com.tr/">omerkoyuncu.com.tr</a>
	</div>
	<div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress 
	<script src="../vendors/nprogress/nprogress.js"></script> -->
<!-- iCheck 
	<script src="../vendors/iCheck/icheck.min.js"></script> -->
	<!-- Datatables -->
	<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!--
<script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script> -->
<!-- <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script> -->
<script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<!--
<script src="../vendors/jszip/dist/jszip.min.js"></script> 
<script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../vendors/pdfmake/build/vfs_fonts.js"></script>  -->

<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts <script src="js/jquery-3.4.1.min.js"></script> -->
<script src="../build/js/custom.min.js"></script>

<!-- satislarincele icin -->
<script>
	$(document).ready(function() {
		$('#checkboxsatisinc').change(function(){
          //alert("degisiklik oldu");
          if($(this).is(":checked")){
          	$('#satisfirma').attr('readonly',false);
          	$('#satissehir').attr('readonly',false);
          	$('#satismodelad').attr('readonly',false);
          }else{
          	$('#satisfirma').attr('readonly',true);
          	$('#satissehir').attr('readonly',true);
          	$('#satismodelad').attr('readonly',true);
          }  
        });
	});
</script> 

<!-- eposta olarak gonder secenegi aktiflesecek -->
<script>
	$(document).ready(function() {
		$('#duruminc').change(function(){
			$('#checkboxinc').attr('checked',true);
		});
	});
</script>

<!-- bootstrap-daterangepicker -->
<script>
	$(document).ready(function() {
		$('#satis_tarih').daterangepicker({
			locale:{
				format: 'YYYY-MM-DD',
				monthNames: [ "Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık" ],
				daysOfWeek: [ "Pa", "Pt", "Sl", "Ça", "Pe", "Cu", "Ct" ],
				firstDay:1,
			},
			singleDatePicker: true,
			calender_style: "picker_4",
		}, function(start, end, label) {
			console.log(start.toISOString(), end.toISOString(), label);
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#satis_tarih1').daterangepicker({
			locale:{
				format: 'YYYY-MM-DD',
				monthNames: [ "Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık" ],
				daysOfWeek: [ "Pa", "Pt", "Sl", "Ça", "Pe", "Cu", "Ct" ],
				firstDay:1,
			},
			singleDatePicker: true,
			calender_style: "picker_4",
		}, function(start, end, label) {
			console.log(start.toISOString(), end.toISOString(), label);
		});
	});
</script>
<!-- /bootstrap-daterangepicker -->

<script>
	$(document).ready(function() {
		$('#log_datatableresponsive').DataTable( {
			"order": [[ 3, "desc" ]],
			"language": {
				"paginate": {
					"previous": "Önceki",
					"next": "Sonraki"
				},
				"info": "Toplam _TOTAL_ kayıttan _START_ ile _END_ arasındakiler gösteriliyor.",
				"emptyTable": "Gösterilecek bir kayıt yok.",
				"infoEmpty": "Gösterilecek bir kayıt yok.",
				"search": "Ara:",
				"zeroRecords": "Eşleşen bir kayıt bulunamadı.",
				"lengthMenu": "_MENU_ kayıt göster",        
				"loadingRecords": "Yükleniyor...",
				"processing": "İşleniyor...",
				"infoFiltered": "(toplam _MAX_ kayıt içinden filtrelendi)",
			}
		});
	});
</script>

<!--datatableresponsive ve delete modal -->
<script>
	$(document).ready(function (){
		var table = $('#datatableresponsive').DataTable({

			"columnDefs": [
          { "visible": false, "targets": -1, "searchable": false} //son sütün gösterme
          ],

          "language": {
          	"paginate": {
          		"previous": "Önceki",
          		"next": "Sonraki"
          	},
          	"info": "Toplam _TOTAL_ kayıttan _START_ ile _END_ arasındakiler gösteriliyor.",
          	"emptyTable": "Gösterilecek bir kayıt yok.",
          	"infoEmpty": "Gösterilecek bir kayıt yok.",
          	"search": "Ara:",
          	"zeroRecords": "Eşleşen bir kayıt bulunamadı.",
          	"lengthMenu": "_MENU_ kayıt göster",

            /*
            "lengthMenu": '<select>'+
            '<option value="10">10</option>'+
            '<option value="25">20</option>'+
            '<option value="50">50</option>'+
            '<option value="100">100</option>'+
            '<option value="-1">Tüm</option>'+
            '</select> kayıt göster',
            */
            
            "loadingRecords": "Yükleniyor...",
            "processing": "İşleniyor...",
            "infoFiltered": "(toplam _MAX_ kayıt içinden filtrelendi)",
          }
        });

    //tablodaki sil butonuna tıklandığı zaman
    $('#datatableresponsive').on('click', '.sil_buton', function(){
    	$('#sil_modal').modal('show');

    	var data = table.row( $(this).parents('tr') ).data();
      //console.log(data);
      if(data == undefined) {
      	var selected_row = $(this).parents('tr');
      	if (selected_row.hasClass('child')) {
      		selected_row = selected_row.prev();
      	}

      	var rowData = $('#datatableresponsive').DataTable().row(selected_row).data();
        //console.log(rowData.length);
        //console.log(rowData[rowData.length-1]);
        $('#silinecek_id').val(rowData[rowData.length-1]);
      }
      else {
        //console.log(data.length);
        //console.log(data[data.length-1]);
        $('#silinecek_id').val(data[data.length-1]);
      }
    });
  });
</script>

</body>
</html>