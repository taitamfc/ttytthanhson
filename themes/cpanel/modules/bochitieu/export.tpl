
	<style>.dt-buttons {float:right;}</style>
	<link href="{URL_THEMES}/table/datatables.min.css" rel="stylesheet"/>
	<link href="{URL_THEMES}/table/datatables.css" rel="stylesheet"/>
	 <script src="{URL_THEMES}/table/datatables.js"></script>
	 <script src="{URL_THEMES}/table/datatables.min.js"></script>
	 <script src="{URL_THEMES}/table/button/js/datatables.buttons.min.js"></script>
	 <script src="{URL_THEMES}/table/pdf/pdfmake.js"></script>
	 <script src="{URL_THEMES}/table/pdf/pdfmake.min.js"></script>
	 <script src="{URL_THEMES}/table/pdf/vfs_fonts.js"></script>
	 <script src="{URL_THEMES}/table/jszip/jszip.min.js"></script>
	 <script>	
		$(document).ready(function() {
			$('#tbl_danhsach').DataTable({
				language:{
							"decimal":        "",
							"emptyTable":     "Không có dữ liệu",
							"info":           "Showing _START_ to _END_ of _TOTAL_ entries",
							"infoEmpty":      "Showing 0 to 0 of 0 entries",
							"infoFiltered":   "(filtered from _MAX_ total entries)",
							"infoPostFix":    "",
							"thousands":      ",",
							"lengthMenu":     "Hiển thị _MENU_ dòng/trang",
							"loadingRecords": "Loading...",
							"processing":     "",
							"search":         "Tìm:",
							"zeroRecords":    "Không tìm thấy thông tin",
							"paginate": {
								"first":      "Trang đầu",
								"last":       "trang cuối",
								"next":       "Trang sau",
								"previous":   "Trang trước"
							},
							"aria": {
								"sortAscending":  ": activate to sort column ascending",
								"sortDescending": ": activate to sort column descending"
							}
						},
				dom: '<"top"B>rt<"bottom"flp><"clear">',searching: false, paging: true, info: false,
				buttons: [{extend: 'print', text: '<i class="fa fa-print"></i> In',className: 'btn btn-success',exportOptions: {modifier: {page: 'current'}}},
					{extend: 'excelHtml5', text: '<i class="fa fa-file-excel-o"></i> EXCEL',className: 'btn btn-warning',exportOptions: {modifier: {page: 'current'}}},
					{extend: 'pdfHtml5', text: '<i class="fa fa-file-pdf-o" ></i> Xuất PDF',className: 'btn  btn-danger',exportOptions: {modifier: {page: 'current'}}}]
			});});
	</script>


