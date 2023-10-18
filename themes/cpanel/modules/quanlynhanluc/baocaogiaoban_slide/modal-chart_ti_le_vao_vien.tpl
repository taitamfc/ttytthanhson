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
    function chart_ti_le_vao_vien() {
        $('#chart_ti_le_vao_vien').modal('show');
        $('#chart_ti_le_vao_vien').on('shown.bs.modal', function(e) {
            $.ajax({
                type: 'post',
                cache: !1,
                url: 'index.php?nv=quanlynhanluc&op=baocaogiaoban_add&is_ajax=1&task=ti_le_vao_vien',
                dataType: "json",
                success: function(res) { //alert(d);
                    $('#ti_le_vao_vien').empty();
                    let the_chart = Morris.Line({
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
                    $('#ti_le_vao_vien_legen').empty();
                    the_chart.options.labels.forEach(function(label, i) {
                        let legendItem = $('<span></span>').text(label).css('color',
                            the_chart.options
                            .lineColors[i])
                        $('#ti_le_vao_vien_legen').append(legendItem)
                    })
                }
            });
        });

    }
</script>