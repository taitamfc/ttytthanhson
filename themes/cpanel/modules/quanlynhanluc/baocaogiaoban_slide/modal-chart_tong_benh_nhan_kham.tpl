<div id="chart_tong_benh_nhan_kham" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modal-title">Tổng bệnh nhân khám</h4>
            </div>
            <div class="modal-body">
                <div class="chart-wrapper" id="tong_benh_nhan_kham"></div>
                <div class="legen-wrapper" id="tong_benh_nhan_kham_legen"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
function chart_tong_benh_nhan_kham() {
    $('#chart_tong_benh_nhan_kham').modal('show');
    $('#chart_tong_benh_nhan_kham').on('shown.bs.modal', function(e) {
        // Tổng số bệnh nhân khám
        $.ajax({
            type: 'post',
            cache: !1,
            url: 'index.php?nv=quanlynhanluc&op=baocaogiaoban_add&is_ajax=1&task=tong_benh_nhan_kham',
            dataType: "json",
            success: function(res) { //alert(d);
            console.log(res);
                $('#tong_benh_nhan_kham').empty();
                let the_chart = Morris.Line({
                    element: 'tong_benh_nhan_kham',
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
                $('#tong_benh_nhan_kham_legen').empty();
                the_chart.options.labels.forEach(function(label, i) {
                    var legendItem = $('<span></span>').text(label).css('color', the_chart
                        .options.lineColors[i])
                    $('#tong_benh_nhan_kham_legen').append(legendItem)
                })
            }
        });
    })
}
</script>