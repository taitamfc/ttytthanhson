
<div id="chart_tong_benh_nhan_dieu_tri_yeu_cau" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modal-title">Bệnh nhân điều trị yêu cầu</h4>
            </div>
            <div class="modal-body">
                <div class="chart-wrapper" id="tong_benh_nhan_dieu_tri_yeu_cau"></div>
                <div class="legen-wrapper" id="tong_benh_nhan_dieu_tri_yeu_cau_legen"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
let the_chart_bndtyc;
var prefix = 'bndtyc_';
let bndtyc_ykeys = bndtyc_labels = bndtyc_lineColors = []
function bndtyc_hideLabel(key){
    if( $('.'+ prefix+'lengen_'+key).hasClass('removed') ){
        the_chart_bndtyc.options.ykeys[key] = bndtyc_ykeys[key]
        the_chart_bndtyc.options.labels[key] = bndtyc_labels[key]
        the_chart_bndtyc.options.lineColors[key] = bndtyc_lineColors[key]
        $('.'+ prefix+'lengen_'+key).removeClass('removed');
    }else{
        delete the_chart_bndtyc.options.ykeys[key];
        delete the_chart_bndtyc.options.labels[key];
        delete the_chart_bndtyc.options.lineColors[key];
        $('.'+ prefix+'lengen_'+key).addClass('removed');
    }
   
    $('#tong_benh_nhan_dieu_tri_yeu_cau').empty();
    the_chart_bndtyc = Morris.Line({
        element: 'tong_benh_nhan_dieu_tri_yeu_cau',
        data: the_chart_bndtyc.options.data,
        xkey: ['ngay'],
        xLabelFormat: function (da) {return ("0" + da.getDate()).slice(-2) + '/' + ("0" + (da.getMonth() + 1)).slice(-2);},
        redraw: true,
        ykeys: the_chart_bndtyc.options.ykeys,
        hideHover: 'auto',
        labels: the_chart_bndtyc.options.labels,
        lineColors: the_chart_bndtyc.options.lineColors,
        resize: true
    });
}

function chart_tong_benh_nhan_dieu_tri_yeu_cau() {
    $('#chart_tong_benh_nhan_dieu_tri_yeu_cau').modal('show');
    $('#chart_tong_benh_nhan_dieu_tri_yeu_cau').on('shown.bs.modal', function(e) {
        $.ajax({
            type: 'post',
            cache: !1,
            url: 'index.php?nv=quanlynhanluc&op=baocaogiaoban_add&is_ajax=1&task=tong_benh_nhan_dieu_tri_yeu_cau',
            dataType: "json",
            success: function(res) { //alert(d);
                $(window).scrollTop(0);
                $('#tong_benh_nhan_dieu_tri_yeu_cau').empty();
                the_chart_bndtyc = Morris.Line({
                    element: 'tong_benh_nhan_dieu_tri_yeu_cau',
                    data: res.data,
                    xkey: ['ngay'],
                    xLabelFormat: function (da) {return ("0" + da.getDate()).slice(-2) + '/' + ("0" + (da.getMonth() + 1)).slice(-2);},
                    redraw: true,
                    ykeys: res.ykeys,
                    hideHover: 'auto',
                    labels: res.labels,
                    lineColors: res.lineColors,
                    resize: true
                });
                bndtyc_ykeys = [...the_chart_bndtyc.options.ykeys]
                bndtyc_labels = [...the_chart_bndtyc.options.labels]
                bndtyc_lineColors = [...the_chart_bndtyc.options.lineColors]

                $('#tong_benh_nhan_dieu_tri_yeu_cau_legen').empty();
                the_chart_bndtyc.options.labels.forEach(function(label, i) {
                    var legendItem = $('<span class="'+prefix+'lengen_'+i+'" onclick="bndtyc_hideLabel('+i+')"></span>').text(label).css('color', the_chart_bndtyc
                        .options.lineColors[i])
                    $('#tong_benh_nhan_dieu_tri_yeu_cau_legen').append(legendItem)
                })
            }
        });
    });
    
}
</script>