

<div id="chart_tong_benh_nhan_dieu_tri" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modal-title">Tổng bệnh nhân điều trị</h4>
            </div>
            <div class="modal-body">
                <div class="chart-wrapper" id="tong_benh_nhan_dieu_tri"></div>
                <div class="legen-wrapper" id="tong_benh_nhan_dieu_tri_legen"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
let the_chart_bndt;
var prefix = 'bndt_';
let bndt_ykeys = bndt_labels = bndt_lineColors = []
function bndt_hideLabel(key){
    if( $('.'+ prefix+'lengen_'+key).hasClass('removed') ){
        the_chart_bndt.options.ykeys[key] = bndt_ykeys[key]
        the_chart_bndt.options.labels[key] = bndt_labels[key]
        the_chart_bndt.options.lineColors[key] = bndt_lineColors[key]
        $('.'+ prefix+'lengen_'+key).removeClass('removed');
    }else{
        delete the_chart_bndt.options.ykeys[key];
        delete the_chart_bndt.options.labels[key];
        delete the_chart_bndt.options.lineColors[key];
        $('.'+ prefix+'lengen_'+key).addClass('removed');
    }
   
    $('#tong_benh_nhan_dieu_tri').empty();
    the_chart_bndt = Morris.Line({
        element: 'tong_benh_nhan_dieu_tri',
        data: the_chart_bndt.options.data,
        xkey: ['ngay'],
        xLabelFormat: function (da) {return ("0" + da.getDate()).slice(-2) + '/' + ("0" + (da.getMonth() + 1)).slice(-2);},
        redraw: true,
        ykeys: the_chart_bndt.options.ykeys,
        hideHover: 'auto',
        labels: the_chart_bndt.options.labels,
        lineColors: the_chart_bndt.options.lineColors,
        resize: true
    });
}

function chart_tong_benh_nhan_dieu_tri() {
    $('#chart_tong_benh_nhan_dieu_tri').modal('show');
    $('#chart_tong_benh_nhan_dieu_tri').on('shown.bs.modal', function(e) {
        $.ajax({
            type: 'post',
            cache: !1,
            url: 'index.php?nv=quanlynhanluc&op=baocaogiaoban_add&is_ajax=1&task=tong_benh_nhan_dieu_tri',
            dataType: "json",
            success: function(res) { //alert(d);
                $(window).scrollTop(0);
                $('#tong_benh_nhan_dieu_tri').empty();
                the_chart_bndt = Morris.Line({
                    element: 'tong_benh_nhan_dieu_tri',
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
                bndt_ykeys = [...the_chart_bndt.options.ykeys]
                bndt_labels = [...the_chart_bndt.options.labels]
                bndt_lineColors = [...the_chart_bndt.options.lineColors]

                $('#tong_benh_nhan_dieu_tri_legen').empty();
                the_chart_bndt.options.labels.forEach(function(label, i) {
                    var legendItem = $('<span class="'+prefix+'lengen_'+i+'" onclick="bndt_hideLabel('+i+')"></span>').text(label).css('color', the_chart_bndt
                        .options.lineColors[i])
                    $('#tong_benh_nhan_dieu_tri_legen').append(legendItem)
                })
            }
        });
    });

    
}
</script>