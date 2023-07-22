<!-- BEGIN: main -->
<div class="tms_box">
	<div class="tms_box_heading">{LANG.ketqua_chupphim_list}</div>
	<div class="tms_box_body">
<div class="ketqua_chupphim_content">
<div class="ngay_kham">{LANG.ngaykham}: {ngaykham} </div>

<ul>
	
		<!-- BEGIN: data -->
		<li>
		<a type="button" class="bmd-modalButton" data-toggle="modal" data-bmdSrc="{data.link}"  data-target="#myModal" >
		<img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/dang-ky-kham-benh/ket_qua_phim.png" style="height:40px;width:80px"class=" pull-left"> 
				<div class="icon_calender">
					<div class="date_calender">{LANG.phim}</div>
					<div class="gio_calender">{data.ngay}</div>
				</div>
		</a>
		</li>
		    
		<!-- END: data -->
	
</ul>

</div>
<div class="tms_box_botom" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"></i> {LANG.back}</div>
<div class="tms_box_thoat"><i class="fa fa-sign-out" aria-hidden="true"></i> {LANG.exit_tms}</div>
</div>
</div>


            

            
	<div class="modal fade" id="myModal">
		<div class="modal-dialog"">
			<div class="modal-content bmd-modalContent">

				<div class="modal-body">
          
          <div class="close-button">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="embed-responsive embed-responsive-16by9">
		<iframe class="embed-responsive-item" frameborder="0"style="width:100%; max-height:900px"></iframe>
          </div>
				</div>

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
 <style> 
.modal {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  overflow: hidden;
}

.modal-dialog {
  position: fixed;
  margin: 0;
  width: 100%;
  height: 100%;
  padding: 0;
}

.modal-content {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  border: 2px solid #3c7dcf;
  border-radius: 0;
  box-shadow: none;
}

.modal-header {
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  height: 50px;
  padding: 10px;
  background: #6598d9;
  border: 0;
}

.modal-title {
  font-weight: 300;
  font-size: 2em;
  color: #fff;
  line-height: 30px;
}

.modal-body {
  position: absolute;
  top: 20px;
  bottom: 20px;
  width: 100%;
  font-weight: 300;
  overflow: auto;
}
 </style> 
 
<script>
(function($) {
    
    $.fn.bmdIframe = function( options ) {
        var self = this;
        var settings = $.extend({
            classBtn: '.bmd-modalButton'
        }, options );
      
        $(settings.classBtn).on('click', function(e) {
          var allowFullscreen = $(this).attr('data-bmdVideoFullscreen') || false;
          
          var dataVideo = {
            'src': $(this).attr('data-bmdSrc'),
            'height': $(this).attr('data-bmdHeight') || settings.defaultH,
            'width': $(this).attr('data-bmdWidth') || settings.defaultW
          };
          
          if ( allowFullscreen ) dataVideo.allowfullscreen = "";
          
          // stampiamo i nostri dati nell'iframe
          $(self).find("iframe").attr(dataVideo);
        });
      
        // se si chiude la modale resettiamo i dati dell'iframe per impedire ad un video di continuare a riprodursi anche quando la modale è chiusa
        this.on('hidden.bs.modal', function(){
          $(this).find('iframe').html("").attr("src", "");
        });
      
        return this;
    };
  
})(jQuery);

jQuery(document).ready(function(){
  jQuery("#myModal").bmdIframe();
});

function goBack() {
    window.history.back();
}
$('.tms_box_thoat').click(function(){
		var logout = 1;
		$.ajax({
				type : 'POST',
				url : nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=search',
				data : { logout : logout},
				success : function(res){
				window.location = nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name;	
				}			
		});
		
	
	});
</script>
<!-- END: main -->