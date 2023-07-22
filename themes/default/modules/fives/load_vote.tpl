<!-- BEGIN: main -->
<form action="#" method="post" enctype="multipart/form-data" id="form-baocom">
    <input type="hidden"   name="user_id" value="{USER_ID}">
    <input type="hidden" name="staff_id" value="{USER_STAFF}">
    <input type="hidden" name="department_id" value="{USER_DEPARTMENT}">
    <!-- BEGIN: cats -->
    <div class="tms_body">
        <h2>{CAT.title}</h2>
        <i style="color: #d40000; font-size: 12px">{CAT.note}</i>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class=" text-center"style="width: 160px;">{LANG.danhmuc}</th>
                        <th class="text-center">{LANG.tieuchi}</th>
                        <!-- BEGIN: rank -->
                        <th class="text-center"style="width: 90px;">{RANK.title}</th>
                        <!-- END: rank -->
                    </tr>
                </thead>
                <tbody>
                    <!-- BEGIN: loop -->
                    <tr>
                        <td> {LOOP.stt}. {LOOP.title} </td>
                        <td> {LOOP.stt}. {LOOP.hometext}</td>
                        <!-- BEGIN: rank -->
                        <td class="text-center"> 
                            <input type="radio" {checked} onclick="click_vote({row_id},{CAT.id},{LOOP.id},{RANK.id})" name="radio_{row_id}_{CAT.id}_{LOOP.id}" class="form-control">
                        </td>
                        <!-- END: rank -->
                    </tr>
                    <!-- END: loop -->
                    <tr>
                        <td class="text-center" colspan="2">{CAT.title_tb}</td>
                        <td class="text-center trungbinh_{CAT.id}" colspan="6"> 
                            {LOOP.avg}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="8">{LANG.caithien} <br/>
                            <input type="text" value="{LOOP.note}" class="form-control note_{CAT.id}" onkeyup="click_vote_2({row_id},{CAT.id})" style="height: 60px;">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>   
    <!-- END: cats -->  
</form>
<style type="text/css">
    .tms_body{margin-bottom: 20px;width: 100%;}	
</style>
<!-- END: main -->