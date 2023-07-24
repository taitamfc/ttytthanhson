<!-- BEGIN: main -->
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery/jquery.validate.min.js"></script>
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.validator-{NV_LANG_INTERFACE}.js">
</script>
<link type="text/css" href="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{BASE_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js">
</script>

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>THÊM BÁO CÁO GIAO BAN</h5>
                    <span style="color: #ff0000;">Trường có dấu (*) là bắt buộc</span>

                </div>
                <div class="card-block">
                    <div class="table-responsive" style="padding-bottom: 100px;">
                        <form name="myform" id="myform" method="post" action="{link_frm}"
                            onsubmit="return nv_execute_update(this);">
                            <input type="hidden" name="token" value="{token}" />
                            <table class="table table-hover table-border" width="100%">
                                <thead>
                                    <tr>
                                        <th class="align-middle" colspan="2">Tên báo cáo:</th>
                                    </tr>
                                    <tr>
                                        <td class='align-middle' colspan="2"><input name='title' value='{DATA.title}'
                                                type='text' class='form-control'></td>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="align-middle">I – THÀNH PHẦN TRỰC</th>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Trực lãnh đạo:</th>
                                        <th class="align-middle">Trực bác sĩ:</th>
                                    </tr>
                                    <tr>
                                        <td class='align-middle'>
                                            <input name='truc_lanh_dao' value='{DATA.truc_lanh_dao}' type='text'
                                                class='form-control'>
                                        </td>
                                        <td class='align-middle'>
                                            <input name='truc_bac_sy' value='{DATA.truc_bac_sy}' type='text'
                                                class='form-control'>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="2" class="align-middle">
                                            II – TÌNH HÌNH BỆNH NHÂN <br>
                                            1 . Tổng số bệnh nhân khám :
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">1.1. Khoa Khám bệnh </th>
                                        <th class="align-middle">1.2. Phòng khám ĐK Phú Thứ </th>
                                    </tr>
                                    <tr>
                                        <td class='align-top'>
                                            <table border="1" width="100%">
                                                <tr>
                                                    <td colspan="2">TỔNG SỐ </td>
                                                    <td>
                                                        <span class="II-tong_so"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="2">Bệnh nhân BHYT246</td>
                                                    <td>Ngoại tỉnh</td>
                                                    <td>62</td>
                                                </tr>
                                                <tr>
                                                    <td>Nội tỉnh</td>
                                                    <td>184</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td class='align-top'>
                                            <table border="1" width="100%">
                                                <tr>
                                                    <td>Phòng Khám ĐK Phú Thứ</td>
                                                    <td>BH</td>
                                                    <td>VP</td>
                                                    <td>Tổng</td>
                                                </tr>
                                                <tr>
                                                    <td>Phòng khám Chung</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>Phòng khám Sản</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>Phòng khám Cấp Cứu</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>0 số BN</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="align-middle" colspan="2">
                                            <table border="1" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td><b>STT</b></td>
                                                        <td><b>Phòng khám</b></td>
                                                        <td><b>Tổng số khám</b></td>
                                                        <td><b>Vào viện</b></td>
                                                        <td><b>% vào viện</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span style="font-weight: 400;">1</span></td>
                                                        <td><span style="font-weight: 400;">PK Mắt</span></td>
                                                        <td><b>29</b></td>
                                                        <td><b>2</b></td>
                                                        <td><b>6.8</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span style="font-weight: 400;">2</span></td>
                                                        <td><span style="font-weight: 400;">PK Số 7</span></td>
                                                        <td><b>17</b></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span style="font-weight: 400;">3</span></td>
                                                        <td><span style="font-weight: 400;">PK RHM</span></td>
                                                        <td><b>12</b></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span style="font-weight: 400;">4</span></td>
                                                        <td><span style="font-weight: 400;">PK Cấp cứu 101</span></td>
                                                        <td><b>32</b></td>
                                                        <td><b>19</b></td>
                                                        <td><b>59.3</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span style="font-weight: 400;">5</span></td>
                                                        <td><span style="font-weight: 400;">PK nội 106</span></td>
                                                        <td><b>24</b></td>
                                                        <td><b>1</b></td>
                                                        <td><b>4.1</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span style="font-weight: 400;">6</span></td>
                                                        <td><span style="font-weight: 400;">PK nội 107</span></td>
                                                        <td><b>44</b></td>
                                                        <td><b>7</b></td>
                                                        <td><b>15.9</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span style="font-weight: 400;">7</span></td>
                                                        <td><span style="font-weight: 400;">PK nội 108</span></td>
                                                        <td><b>40</b></td>
                                                        <td><b>2</b></td>
                                                        <td><b>5</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span style="font-weight: 400;">8</span></td>
                                                        <td><span style="font-weight: 400;">PK Sản 105</span></td>
                                                        <td><b>25</b></td>
                                                        <td><b>6</b></td>
                                                        <td><b>24</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span style="font-weight: 400;">9</span></td>
                                                        <td><span style="font-weight: 400;">PK Nhi 104</span></td>
                                                        <td><b>21</b></td>
                                                        <td><b>8</b></td>
                                                        <td><b>38</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span style="font-weight: 400;">10</span></td>
                                                        <td><span style="font-weight: 400;">PK Ngoại 103</span></td>
                                                        <td><b>19</b></td>
                                                        <td><b>2</b></td>
                                                        <td><b>10.5</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span style="font-weight: 400;">11</span></td>
                                                        <td><span style="font-weight: 400;">PK Yêu cầu</span></td>
                                                        <td><b>10</b></td>
                                                        <td><b>2</b></td>
                                                        <td><b>20</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span style="font-weight: 400;">12</span></td>
                                                        <td><span style="font-weight: 400;">PK Đông Y</span></td>
                                                        <td><b>4</b></td>
                                                        <td><b>4</b></td>
                                                        <td><b>100</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b> </b><span style="font-weight: 400;">13</span></td>
                                                        <td><span style="font-weight: 400;">PK TMH 210</span></td>
                                                        <td><b>5</b></td>
                                                        <td><b>1</b></td>
                                                        <td><b>2</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><b>Tổng số</b></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>


                                    <tr>
                                        <th colspan="2">
                                        2. HOẠT ĐỘNG ĐIỀU TRỊ
                                        </th>
                                    </tr>

                                    <tr>
                                        <td class='align-middle' colspan="2">
                                            &nbsp;
                                            <table border="1" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td rowspan="2"><b>KHOA PHÒNG </b></td>
                                                        <td rowspan="2"><b>BN</b>

                                                            <b>Cũ </b>
                                                        </td>
                                                        <td rowspan="2"><b>BN</b>

                                                            <b>Vào viện</b>
                                                        </td>
                                                        <td rowspan="2"><b>BN</b>

                                                            <b>Ra Viện</b>
                                                        </td>
                                                        <td rowspan="2"><b>BN </b>

                                                            <b>Chuyển</b>

                                                            <b>Khoa</b>
                                                        </td>
                                                        <td rowspan="2"><b>BN</b>

                                                            <b>Chuyển</b>

                                                            <b>Viện</b>
                                                        </td>
                                                        <td rowspan="2"><b>BN</b>

                                                            <b>Xin Về</b>
                                                        </td>
                                                        <td colspan="3"><b>BN HIỆN CÓ </b></td>
                                                        <td rowspan="2"><b>Chi tiết BN</b>

                                                            <b>Yêu cầu</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>BN Nội Trú</b></td>
                                                        <td><b>BN </b>

                                                            <b>Ngoại trú</b>
                                                        </td>
                                                        <td><b>Tổng số BN</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Khoa CC-HSTC-CĐ</b></td>
                                                        <td><b>44</b></td>
                                                        <td><b>7</b></td>
                                                        <td><b>7</b></td>
                                                        <td></td>
                                                        <td><b>2</b></td>
                                                        <td><b>1</b></td>
                                                        <td><b>27</b></td>
                                                        <td><b>14</b></td>
                                                        <td><b>41</b></td>
                                                        <td><b>17</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Khoa Ngoại-TH</b></td>
                                                        <td><b>53</b></td>
                                                        <td><b>12</b></td>
                                                        <td><b>9</b></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><b>2</b></td>
                                                        <td><b>54</b></td>
                                                        <td></td>
                                                        <td><b>54</b></td>
                                                        <td><b>28</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Khoa Phụ Sản</b></td>
                                                        <td><b>55</b></td>
                                                        <td><b>8</b></td>
                                                        <td><b>7</b></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><b>56</b></td>
                                                        <td></td>
                                                        <td><b>56</b></td>
                                                        <td><b>43</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Khoa Nhi</b></td>
                                                        <td><b>42</b></td>
                                                        <td><b>9</b></td>
                                                        <td><b>6</b></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><b>45</b></td>
                                                        <td></td>
                                                        <td><b>45</b></td>
                                                        <td><b>25</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Khoa Nội-Tn</b></td>
                                                        <td><b>51</b></td>
                                                        <td><b>18</b></td>
                                                        <td><b>10</b></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><b>59</b></td>
                                                        <td></td>
                                                        <td><b>59</b></td>
                                                        <td><b>10</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Khoa Covid 19</b></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Khu YHCT&amp;PHCN</b></td>
                                                        <td><b>57</b></td>
                                                        <td><b>4</b></td>
                                                        <td><b>5</b></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><b>26</b></td>
                                                        <td><b>30</b></td>
                                                        <td><b>56</b></td>
                                                        <td><b>4</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>TỔNG CỘNG</b></td>
                                                        <td><b>302</b></td>
                                                        <td><b>58</b></td>
                                                        <td><b>44</b></td>
                                                        <td></td>
                                                        <td><b>2</b></td>
                                                        <td><b>3</b></td>
                                                        <td><b>267</b></td>
                                                        <td><b>44</b></td>
                                                        <td><b>311</b></td>
                                                        <td><b>127</b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="2">
                                        3. BỆNH NHÂN MỔ CẤP CỨU: 05
                                        </th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                        <textarea style="width:100%"></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="2">
                                        4. BỆNH NHÂN MỔ PHIÊN : 05
                                        </th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                        <textarea style="width:100%"></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="2">
                                        5. BỆNH NHÂN CHUYỂN TUYẾN: 03
                                        </th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                        <textarea style="width:100%"></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="2">
                                        6. BỆNH NHÂN THEO DÕI
                                        </th>
                                    </tr>

                                    {FILE "baocaogiaoban/khoa-hscc.tpl"}
                                    {FILE "baocaogiaoban/khoa-ngoai.tpl"}
                                    {FILE "baocaogiaoban/khoa-phu-san.tpl"}
                                    {FILE "baocaogiaoban/khoa-noi.tpl"}
                                    {FILE "baocaogiaoban/khoa-nhi.tpl"}
                                    {FILE "baocaogiaoban/khoa-yhct.tpl"}
                                    
                                    <tr>
                                        <td class="align-middle" colspan="2">
                                            <button type="submit" class="btn btn-success">
                                                <i class="ti-save"></i><strong>Lưu văn bản</strong></button>
                                            <a href="{link_close}" class="btn bnt-mini btn-danger">
                                                <i class="fa fa-times" aria-hidden="true"></i>Đóng</a>
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
       $('.clone-btn').on('click',function(){
            alert(123);
       });
    });
</script>
<!-- END: main -->