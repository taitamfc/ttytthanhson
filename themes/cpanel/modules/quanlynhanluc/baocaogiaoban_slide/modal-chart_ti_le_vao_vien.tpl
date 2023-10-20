<div id="chart_ti_le_vao_vien" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modal-title">Tỉ lệ vào viện</h4>
            </div>
            <div class="modal-body">
                <div class="chart-wrapper" id="ti_le_vao_vien"></div>
                <div class="legen-wrapper" id="ti_le_vao_vien_legen"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
let the_chart_bnvv;
var prefix = 'bnvv_';
let bnvv_ykeys = bnvv_labels = bnvv_lineColors = []
function bnvv_hideLabel(key){
    if( $('.'+ prefix+'lengen_'+key).hasClass('removed') ){
        the_chart_bnvv.options.ykeys[key] = bnvv_ykeys[key]
        the_chart_bnvv.options.labels[key] = bnvv_labels[key]
        the_chart_bnvv.options.lineColors[key] = bnvv_lineColors[key]
        $('.'+ prefix+'lengen_'+key).removeClass('removed');
    }else{
        delete the_chart_bnvv.options.ykeys[key];
        delete the_chart_bnvv.options.labels[key];
        delete the_chart_bnvv.options.lineColors[key];
        $('.'+ prefix+'lengen_'+key).addClass('removed');
    }
   
    $('#ti_le_vao_vien').empty();
    the_chart_bnvv = Morris.Line({
        element: 'ti_le_vao_vien',
        data: the_chart_bnvv.options.data,
        xkey: ['ngay'],
        xLabelFormat: function (da) {return ("0" + da.getDate()).slice(-2) + '/' + ("0" + (da.getMonth() + 1)).slice(-2);},
        redraw: true,
        ykeys: the_chart_bnvv.options.ykeys,
        hideHover: 'auto',
        labels: the_chart_bnvv.options.labels,
        lineColors: the_chart_bnvv.options.lineColors,
        resize: true
    });
}

    function chart_ti_le_vao_vien() {
        $('#chart_ti_le_vao_vien').modal('show');
        $('#chart_ti_le_vao_vien').on('shown.bs.modal', function(e) {
            $.ajax({
                type: 'post',
                cache: !1,
                url: 'index.php?nv=quanlynhanluc&op=baocaogiaoban_add&is_ajax=1&task=ti_le_vao_vien',
                dataType: "json",
                success: function(res) { //alert(d);
                    $(window).scrollTop(0);
                    $('#ti_le_vao_vien').empty();
                    the_chart_bnvv = Morris.Line({
                        element: 'ti_le_vao_vien',
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
                    bnvv_ykeys = [...the_chart_bnvv.options.ykeys]
                    bnvv_labels = [...the_chart_bnvv.options.labels]
                    bnvv_lineColors = [...the_chart_bnvv.options.lineColors]

                    $('#ti_le_vao_vien_legen').empty();
                    the_chart_bnvv.options.labels.forEach(function(label, i) {
                        var legendItem = $('<span class="'+prefix+'lengen_'+i+'" onclick="bnvv_hideLabel('+i+')"></span>').text(label).css('color', the_chart_bnvv
                            .options.lineColors[i])
                        $('#ti_le_vao_vien_legen').append(legendItem)
                    })

                }
            });
        });

    }
</script>