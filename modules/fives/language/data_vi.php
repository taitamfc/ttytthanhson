<?php

/**
 * @Project TMS HOLDINGS
 * @Author TMS HOLDINGS <contact@tms.vn>
 * @Copyright (C) 2022 TMS HOLDINGS. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Tue, 26 Jul 2022 08:31:48 GMT
 */

if (!defined('NV_ADMIN'))
    die('Stop!!!');

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_cats (id, title, title_tb, note, user_add, time_add, weight, status) VALUES('1', 'A. Cam kết của lãnh đạo', 'A. Điểm trung bình của cam kết', 'Mục 1,2,3,4 chọn: Không (0), Hầu như không (1), Một vài (2), Hầu hết (3), Gần tất cả (4), Tất cả (5).&nbsp;<br />
Mục 5 chọn: Không bao giờ (0), Hiếm khi (1), Đôi khi (2), Thỉnh thoảng (3), Thường xuyên (4), Hằng ngày (5).', '1', '1656003600', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_cats (id, title, title_tb, note, user_add, time_add, weight, status) VALUES('2', 'B. Tổ chức và khuyến khích', 'B. Điểm trung bình của Vai trò lãnh đạo', 'Chọn: Không (0), Hầu như không (1), Một vài (2), Hầu hết (3), Gần tất cả (4), Tất cả (5).', '1', '1658210760', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_cats (id, title, title_tb, note, user_add, time_add, weight, status) VALUES('3', 'S1 (Sàng lọc)', 'Điểm TB của S1 (nhận biết và loại bỏ những thứ không cần thiết)', 'Mục 1,2,3,4 chọn: Không (0), Hầu như không (1), Một vài (2), Hầu hết (3), Gần tất cả (4), Tất cả (5).&nbsp;<br />
Mục 5 chọn: &gt; 3 tháng (0), Tháng (1), Tuần (2), Ngày (3), Giờ (4), Phút (5).', '1', '1658210773', '3', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_cats (id, title, title_tb, note, user_add, time_add, weight, status) VALUES('4', 'S2 (Sắp xếp)', 'Điểm TB của S2 (một chỗ có đủ mọi thứ, mỗi thứ đặt đúng vị trí)', 'Chọn: Không (0), Hầu như không (1), Một vài (2), Hầu hết (3), Gần tất cả (4), Tất cả (5).', '1', '1658210781', '4', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_cats (id, title, title_tb, note, user_add, time_add, weight, status) VALUES('5', 'S3 (Sạch sẽ)', 'Điểm TB của S3 (Môi trường làm việc có tổ chức và hiệu quả)', 'Chọn: Rất bẩn (0), Bẩn (1), Bụi bặm (2), Sạch (3), Rất sạch (4), Như mới (5).', '1', '1658210790', '5', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_cats (id, title, title_tb, note, user_add, time_add, weight, status) VALUES('6', 'S4 (Săn sóc)', 'Điểm TB của S4 (xây dựng SOPs và thực hiện theo chuẩn)', 'Chọn: Không bao giờ (0), Hiếm khi (1), Thỉnh thoảng (2), Thườn xuyên (3), Hằng ngày (4), Liên tục (5)', '3', '1658242718', '6', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_cats (id, title, title_tb, note, user_add, time_add, weight, status) VALUES('7', 'S5 (Sẵn sàng)', 'Điểm TB của S5 ( 5 S là thói quen trong công việc)', 'Chọn: Không (0), Hầu như không (1), Một vài (2), Hầu hết (3), Gần tất cả (4), Tất cả (5).', '3', '1658242742', '7', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_cats (id, title, title_tb, note, user_add, time_add, weight, status) VALUES('8', 'S6 (An toàn, Safety)', 'Điểm TB của S6 (5 S An toàn trong công việc)', 'Chọn: Không (0), Hầu như không (1), Một vài (2), Hầu hết (3), Gần tất cả (4), Tất cả (5).', '3', '1658242762', '8', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('1', '1', 'Chính sách về 5 S', 'Có quyết định thành lập nhóm chuyên trách về 5 S; có văn bản quy định thực hiện 5 S; Có kế hoạch thực hành tốt 5 S cấp BV và khoa/phòng.', '1', '1656003600', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('2', '1', 'Tuyên truyền và thấu hiểu chính sách 5 S', 'Có bằng chứng đã tổ chức tuyên truyền, phát động toàn đơn vị thực hiện 5 S: biểu hiện bằng CBNV phát biểu đúng nội dung và trách nhiệm cá nhân (hỏi ít nhất 10 người, tối đa10% CBNV)', '1', '1658210760', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('3', '1', 'Huy động tất cả đơn vị trong BV thực hiện 5 S', 'Các khoa/phòng/đơn vị ký cam kết bằng văn bản và hành động hưởng ứng thực hiện 5 S', '1', '1658210773', '3', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('4', '1', 'Đảm bảo nguồn lực thực hiện 5 S', 'Đầu tư kinh phí cho đào tạo, tập huấn, phương tiện cho thực hành, thăm quan, học tập, kiểm tra, đánh giá nội bộ và khen thưởng', '1', '1658210781', '4', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('5', '1', 'Thời gian dành cho 5 S', 'Có dành thời gian hoạt động chỉ đạo, thực hành; đánh giá các hoạt động 5 S', '1', '1658210790', '5', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('6', '2', 'Tổ chức thực hiện 5 S', 'Có đội/nhóm quản lý thực hành tốt 5 S ở các cấp của BV; các nhóm thực hiện nhiệm vụ được giao', '1', '1658244495', '6', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('7', '2', 'Phân công trách nhiệm, vị trí thực hiện 5 S', 'Có văn bản phân công trách nhiệm thực hiện 5 S ở tất cả các vị trí tại các khoa/phòng', '1', '1658244515', '7', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('8', '2', 'Đào tạo, tập huấn về thực hành tốt 5 S', 'Tất cả CBNV bệnh viện được đào tạo, tập huấn về 5 S (xem danh sách)', '1', '1658244532', '8', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('9', '2', 'Phong trào thực hành tốt 5 S', 'Có các khẩu hiệu, bản tin, triển lãm hình ảnh về 5 S và phong trào thi đua thực hành tốt 5 S', '1', '1658244563', '9', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('10', '2', 'Khuyến khích, động viên thực hành tốt 5 S', 'Có cơ chế khuyến khích, động viên, khen thưởng CBNV về thực hành tốt 5 S', '1', '1658244578', '10', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('11', '3', 'Đồ đạc (Bàn, ghế, giường, tủ, và các nội thất)', 'Chỉ có đồ vật cần thiết để thực hiện công việc. Không có vật không cần thiết', '1', '1658244593', '11', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('12', '3', 'Máy móc, phương tiện/dụng cụ và thứ khác', 'Chỉ có phương tiện, máy, dụng cụ cần để thực hiện công việc', '1', '1658244609', '12', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('13', '3', 'Vật tư tiêu hao, văn phòng phẩm và vật dụng khác', 'Chỉ có vật dụng đủ để thực hiện công việc trong ca làm việc', '1', '1658244625', '13', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('14', '3', 'Tài liệu, bảng, tranh ảnh treo tường', 'Được cập nhật để thực hiện công việc', '1', '1658244640', '14', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('15', '3', 'Quy định địa điểm, thời gian, quy trình gắn, cất giữ vật dụng, máy móc phương tiến gắn thẻ đỏ, vàng', 'Có quy định, quy trình bằng văn bản về địa điểm, thời gian, quy trình gắn thẻ đỏ, vàng và thực hiện gắn thẻ, lưu giữ', '1', '1658244654', '15', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('16', '4', 'Đồ đạc (Bàn, ghế, giường, tủ, và nội thất)', 'Có nhãn và đặt đúng chỗ cần thiết', '1', '1658244676', '16', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('17', '4', 'Máy móc/ phương tiện/dụng cụ/nơi cất giữ', 'Có nhãn, đường kẻ quy định vị trí, đặt đúng chỗ', '1', '1658244714', '17', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('18', '4', 'Thuốc, phương tiện, vật tư tiêu hao, văn phòng phẩm', 'Xếp đặt thuốc, phương tiện, vật tư tiêu hao đặt đúng nơi, có nhãn, dễ tìm, dễ thấy, dễ lấy', '1', '1658245033', '18', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('19', '4', 'Tài liệu, bảng, tranh ảnh treo tường', 'Sắp xếp ngay ngắn/cập nhật/ có nhãn và tiện dụng', '1', '1658245176', '19', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('20', '4', 'Sàn/hành lang/tường', 'Lối đi thông thoáng, không có vật dụng cản trở lối đi, bảng biểu dễ nhìn, rõ ràng', '1', '1658245194', '20', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('21', '5', 'Đồ đạc (Bàn, ghế, giường, tủ và nội thất)', 'Sạch/sơn (nếu cần) và không lộn xộn', '1', '1658245210', '21', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('22', '5', 'Máy móc/ phương tiện/dụng cụ/nơi cất giữ', 'Sạch/sơn (nếu cần) và không có rác, không cặn lắng đọng', '1', '1658245221', '22', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('23', '5', 'Thùng chứa chất thải, thùng chứa vật dụng tái chế', 'Sạch/ không cáu bẩn, không vương vãi thức ăn, đồ uống và các thứ khác', '1', '1658245232', '23', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('24', '5', 'Phương tiện làm sạch/vệ sinh', 'Sạch/ không cặn lắng đọng và vết bẩn', '1', '1658245246', '24', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('25', '5', 'Sàn, hành lang, cầu thang, bề mặt, bảng và tường', 'Sạch/không lắng cặn/thức ăn, vết đổ đồ uống và dịch khác', '1', '1658245256', '25', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('26', '6', 'Sàng lọc', 'Đã được sàng lọc lại (Không có thứ không cần thiết)', '1', '1658245276', '26', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('27', '6', 'Sắp xếp', 'Đã được sắp xếp lại (không có vật dụng để ngoài vị trí của nó), không dư', '1', '1658245287', '27', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('28', '6', 'Sạch sẽ', 'Bằng chứng phân công người chịu trách nhiệm thực hiện 5 S', '1', '1658245298', '28', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('29', '6', 'Săn sóc', 'Có trực quan các quy trình sàng lọc; quy trình sắp xếp; quy trình làm sạch; khẩu hiệu 5 S; bảng phân công thực hiện, kiểm tra, giám sát; tài liệu, bảng tin được cập nhật', '1', '1658245310', '29', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('30', '6', 'Máy móc', 'Có lý lịch máy và bằng chứng sử dụng, bảo dưỡng, kiểm tra máy móc', '1', '1658245321', '30', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('31', '7', 'Cam kết', 'Mọi người cam kết hưởng ứng 5S và thực hành 5 S hàng ngày', '1', '1658245340', '31', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('32', '7', 'Số liệu', 'Có báo cáo KQ đánh giá và công khai KQ ở các cấp độ', '1', '1658245352', '32', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('33', '7', 'Quản lý', 'Bằng chứng Lãnh đạo BV, khoa/phòng chủ động hỗ trợ 5 S', '1', '1658245363', '33', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('34', '7', 'Lồng ghép', '5S được áp dụng ở tất cả các khâu làm việc trong BV', '1', '1658245372', '34', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('35', '7', 'Thời gian dành cho 5 S', 'Có dành thời gian hoạt động chỉ đạo, thực hành; đánh giá các hoạt động 5 S', '1', '1658245383', '35', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('36', '8', 'Phương tiện phòng hộ', 'Nhân viên y tế đang thực hành KCB mang phương tiện phòng hộ cần thiết và đúng theo quy định', '1', '1658245396', '36', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('37', '8', 'Tiếp cận với thuốc, các phương tiện, máy móc, xe thủ thuật (tiêm, thay băng…)', 'Lối đi, cách tiếp cận với thuốc, các phương tiện, thiết bị được dễ dàng, không có nguy cơ mất an toàn', '1', '1658245406', '37', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('38', '8', 'Môi trường làm việc', 'Ánh sáng, không khí, nhiệt độ, tiếng ồn và môi trường khoa/phòng phù hợp, an toàn', '1', '1658245418', '38', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('39', '8', 'Chất lượng thuốc, phương tiện, máy móc, dụng cụ', 'Phương tiện, máy móc, dụng cụ vận hành được, chính xác và an toàn', '1', '1658245427', '39', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_content (id, catsid, title, hometext, user_add, time_add, weight, status) VALUES('40', '8', 'Lưu giữ thuốc, phương tiện, dụng cụ, máy móc', 'Phương tiện, máy móc, dụng cụ được cất giữ đúng quy định, đúng vị trí, đảm bảo an toàn và còn hạn sử dụng', '1', '1658245438', '40', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department (id, userid, department_code, name_department, time_add, user_add, time_edit, user_edit, status, weight) VALUES('1', '0', 'PB00001', 'KẾ HOẠCH NGHIỆP VỤ', '1658217841', '3', '1658645749', '3', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department (id, userid, department_code, name_department, time_add, user_add, time_edit, user_edit, status, weight) VALUES('2', '0', 'PB00002', 'TỔ CHỨC HÀNH CHÍNH', '1658217896', '3', '1658645735', '3', '1', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department (id, userid, department_code, name_department, time_add, user_add, time_edit, user_edit, status, weight) VALUES('3', '0', 'PB00003', 'ĐIỀU DƯỠNG', '1658234501', '3', '1658375782', '3', '1', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department (id, userid, department_code, name_department, time_add, user_add, time_edit, user_edit, status, weight) VALUES('4', '0', 'PB00004', 'KẾ TOÁN', '1658645756', '3', '', '', '1', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department (id, userid, department_code, name_department, time_add, user_add, time_edit, user_edit, status, weight) VALUES('5', '0', 'PB00005', 'QUẢN LÝ CHẤT LƯỢNG', '1658645793', '3', '', '', '1', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department (id, userid, department_code, name_department, time_add, user_add, time_edit, user_edit, status, weight) VALUES('6', '0', 'PB00006', 'KHÁM BỆNH', '1658645984', '3', '', '', '1', '6')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department (id, userid, department_code, name_department, time_add, user_add, time_edit, user_edit, status, weight) VALUES('7', '0', 'PB00007', 'CẤP CỨU - HSTC - CĐ', '1658646000', '3', '', '', '1', '7')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department (id, userid, department_code, name_department, time_add, user_add, time_edit, user_edit, status, weight) VALUES('8', '0', 'PB00008', 'NGOẠI TH', '1658646010', '3', '', '', '1', '8')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department (id, userid, department_code, name_department, time_add, user_add, time_edit, user_edit, status, weight) VALUES('9', '0', 'PB00009', 'NỘI TỔNG HỢP', '1658646025', '3', '', '', '1', '9')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department (id, userid, department_code, name_department, time_add, user_add, time_edit, user_edit, status, weight) VALUES('10', '0', 'PB00010', 'KHOA CSSKSS', '1658646249', '3', '', '', '1', '10')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department (id, userid, department_code, name_department, time_add, user_add, time_edit, user_edit, status, weight) VALUES('11', '0', 'PB00011', 'NHI', '1658646260', '3', '', '', '1', '11')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department (id, userid, department_code, name_department, time_add, user_add, time_edit, user_edit, status, weight) VALUES('12', '0', 'PB00012', 'YHCT & PHCN', '1658646273', '3', '', '', '1', '12')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department (id, userid, department_code, name_department, time_add, user_add, time_edit, user_edit, status, weight) VALUES('13', '0', 'PB00013', 'GÂY MÊ HỒI SỨC', '1658646289', '3', '', '', '1', '13')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department (id, userid, department_code, name_department, time_add, user_add, time_edit, user_edit, status, weight) VALUES('14', '0', 'PB00014', 'DƯỢC - TTB & VTYT', '1658646309', '3', '', '', '1', '14')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department (id, userid, department_code, name_department, time_add, user_add, time_edit, user_edit, status, weight) VALUES('15', '0', 'PB00015', 'CHẨN ĐOÁN HÌNH ẢNH', '1658646324', '3', '', '', '1', '15')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_department (id, userid, department_code, name_department, time_add, user_add, time_edit, user_edit, status, weight) VALUES('16', '0', 'PB00016', 'XÉT NGHIỆM', '1658646330', '3', '', '', '1', '16')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rank (id, title, numer_rank, user_add, time_add, weight, status) VALUES('1', 'Rất kém', '0', '1', '1656003600', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rank (id, title, numer_rank, user_add, time_add, weight, status) VALUES('2', 'Kém', '1', '1', '1658210760', '2', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rank (id, title, numer_rank, user_add, time_add, weight, status) VALUES('3', 'Yếu', '2', '1', '1658210773', '3', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rank (id, title, numer_rank, user_add, time_add, weight, status) VALUES('4', 'Trung bình', '3', '1', '1658210781', '4', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rank (id, title, numer_rank, user_add, time_add, weight, status) VALUES('5', 'Tốt', '4', '1', '1658210790', '5', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rank (id, title, numer_rank, user_add, time_add, weight, status) VALUES('6', 'Rất tốt', '5', '1', '1658222732', '6', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_row (id, title, alias, time_from, time_to, hometext, user_add, time_add, status, weight) VALUES('1', 'Lần 1', 'Lan-1', '1640970000', '1643562000', '<span style=\"font-size:14.0pt\"><span style=\"font-family:&#039;Times New Roman&#039;,serif\">Đội đánh giá thực hành 5 S báo cáo kết quả đánh giá bằng văn bản tới Hội đồng QLCLBV và Giám đốc bản để đưa lên bản tin và thông báo tới toàn bệnh viện tại giao ban bệnh viện hoặc cuộc họp cán bộ chủ chốt các khoa phòng trong bệnh viện. Báo cáo kết quả đánh giá cần có đề xuất khen thưởng cá nhân và đơn vị thực hiện 5 S tốt nhất trong tháng hoặc quý</span></span>', '1', '1658374741', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_row (id, title, alias, time_from, time_to, hometext, user_add, time_add, status, weight) VALUES('2', 'Lần 2', 'Lan-2', '1643648400', '1645981200', '<span style=\"font-size:14.0pt\"><span style=\"font-family:&#039;Times New Roman&#039;,serif\">Đội đánh giá thực hành 5 S báo cáo kết quả đánh giá bằng văn bản tới Hội đồng QLCLBV và Giám đốc bản để đưa lên bản tin và thông báo tới toàn bệnh viện tại giao ban bệnh viện hoặc cuộc họp cán bộ chủ chốt các khoa phòng trong bệnh viện. Báo cáo kết quả đánh giá cần có đề xuất khen thưởng cá nhân và đơn vị thực hiện 5 S tốt nhất trong tháng hoặc quý</span></span>', '1', '1658374757', '1', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_row (id, title, alias, time_from, time_to, hometext, user_add, time_add, status, weight) VALUES('3', 'Lần 3', 'Lan-3', '1646067600', '1648659600', '<span style=\"font-size:14.0pt\"><span style=\"font-family:&#039;Times New Roman&#039;,serif\">Đội đánh giá thực hành 5 S báo cáo kết quả đánh giá bằng văn bản tới Hội đồng QLCLBV và Giám đốc bản để đưa lên bản tin và thông báo tới toàn bệnh viện tại giao ban bệnh viện hoặc cuộc họp cán bộ chủ chốt các khoa phòng trong bệnh viện. Báo cáo kết quả đánh giá cần có đề xuất khen thưởng cá nhân và đơn vị thực hiện 5 S tốt nhất trong tháng hoặc quý</span></span>', '1', '1658374776', '1', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_row (id, title, alias, time_from, time_to, hometext, user_add, time_add, status, weight) VALUES('4', 'Lần 4', 'Lan-4', '1648746000', '1651251600', '<span style=\"font-size:14.0pt\"><span style=\"font-family:&#039;Times New Roman&#039;,serif\">Đội đánh giá thực hành 5 S báo cáo kết quả đánh giá bằng văn bản tới Hội đồng QLCLBV và Giám đốc bản để đưa lên bản tin và thông báo tới toàn bệnh viện tại giao ban bệnh viện hoặc cuộc họp cán bộ chủ chốt các khoa phòng trong bệnh viện. Báo cáo kết quả đánh giá cần có đề xuất khen thưởng cá nhân và đơn vị thực hiện 5 S tốt nhất trong tháng hoặc quý</span></span>', '1', '1658374791', '1', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_row (id, title, alias, time_from, time_to, hometext, user_add, time_add, status, weight) VALUES('5', 'Lần 5', 'Lan-5', '1651338000', '1653930000', '', '1', '1658374807', '1', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_row (id, title, alias, time_from, time_to, hometext, user_add, time_add, status, weight) VALUES('6', 'Lần 6', 'Lan-6', '1654016400', '1656522000', '', '1', '1658374820', '1', '6')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_row (id, title, alias, time_from, time_to, hometext, user_add, time_add, status, weight) VALUES('7', 'Lần 7', 'Lan-7', '1656608400', '1659200400', '', '1', '1658374828', '1', '7')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_row (id, title, alias, time_from, time_to, hometext, user_add, time_add, status, weight) VALUES('8', 'Lần 8', 'Lan-8', '1659286800', '1661878800', '', '1', '1658374842', '1', '8')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_row (id, title, alias, time_from, time_to, hometext, user_add, time_add, status, weight) VALUES('9', 'Lần 9', 'Lan-9', '1661965200', '1664470800', '', '1', '1658374861', '1', '9')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_row (id, title, alias, time_from, time_to, hometext, user_add, time_add, status, weight) VALUES('10', 'Lần 10', 'Lan-10', '1664557200', '1667149200', '', '1', '1658374881', '1', '10')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_row (id, title, alias, time_from, time_to, hometext, user_add, time_add, status, weight) VALUES('11', 'Lần 11', 'Lan-11', '1667235600', '1669741200', '', '1', '1658374893', '1', '11')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_row (id, title, alias, time_from, time_to, hometext, user_add, time_add, status, weight) VALUES('12', 'Lần 12', 'Lan-12', '1669827600', '1672419600', '', '1', '1658374908', '1', '12')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('2', '1', '1', '1', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('3', '1', '2', '1', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('4', '1', '3', '1', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('5', '1', '3', '3', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('6', '1', '2', '3', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('7', '1', '1', '3', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('8', '1', '1', '4', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('9', '1', '4', '1', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('10', '1', '5', '1', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('11', '1', '6', '1', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('12', '1', '7', '1', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('13', '1', '8', '1', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('14', '1', '9', '1', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('15', '1', '10', '1', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('16', '1', '11', '1', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('17', '1', '12', '1', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('18', '1', '13', '1', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('19', '1', '14', '1', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('20', '1', '15', '1', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote (id, row_id, department_id, userid, time_add, time_edit) VALUES('21', '1', '16', '1', '1658768400', '1658768400')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('10', '2', '5', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('9', '2', '4', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('8', '2', '3', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('7', '2', '2', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('6', '2', '1', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('11', '3', '1', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('12', '3', '2', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('13', '3', '3', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('14', '3', '4', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('15', '3', '5', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('16', '4', '1', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('17', '4', '2', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('18', '4', '3', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('19', '4', '4', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('20', '4', '5', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('21', '5', '1', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('22', '5', '2', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('23', '5', '3', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('24', '5', '4', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('25', '5', '5', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('26', '6', '1', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('27', '6', '2', '5', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('28', '6', '3', '5', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('29', '6', '4', '4', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('30', '6', '5', '4', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('31', '7', '1', '4', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('32', '7', '2', '4', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('33', '7', '4', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('34', '7', '5', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('35', '7', '3', '5', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('36', '8', '1', '4', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('37', '8', '2', '5', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('38', '8', '3', '5', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('39', '8', '4', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('40', '8', '5', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('41', '9', '1', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('42', '9', '2', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('43', '9', '3', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('44', '9', '4', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('45', '9', '5', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('46', '10', '1', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('47', '10', '2', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('48', '10', '3', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('49', '10', '4', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('50', '10', '5', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('51', '11', '1', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('52', '11', '2', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('53', '11', '3', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('54', '11', '4', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('55', '11', '5', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('56', '12', '1', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('57', '12', '2', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('58', '12', '3', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('59', '12', '4', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('60', '12', '5', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('61', '13', '1', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('62', '13', '2', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('63', '13', '3', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('64', '13', '4', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('65', '13', '5', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('66', '14', '1', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('67', '14', '2', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('68', '14', '3', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('69', '14', '4', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('70', '14', '5', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('71', '15', '1', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('72', '15', '2', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('73', '15', '3', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('74', '15', '4', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('75', '15', '5', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('76', '16', '1', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('77', '16', '2', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('78', '16', '3', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('79', '16', '4', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('80', '16', '5', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('81', '17', '1', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('82', '17', '2', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('83', '17', '3', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('84', '17', '4', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('85', '17', '5', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('86', '18', '1', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('87', '18', '2', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('88', '18', '3', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('89', '18', '4', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('90', '18', '5', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('91', '19', '1', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('92', '19', '2', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('93', '19', '3', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('94', '19', '4', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('95', '19', '5', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('96', '20', '1', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('97', '20', '2', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('98', '20', '3', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('99', '20', '4', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('100', '20', '5', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('101', '21', '1', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('102', '21', '2', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('103', '21', '3', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('104', '21', '4', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_item (id, vote_vote_id, contentid, rankid, number_rank) VALUES('105', '21', '5', '6', '5')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('2', '2', '1', '5', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('3', '3', '1', '5', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('4', '4', '1', '5', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('5', '5', '1', '5', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('6', '6', '1', '3.8', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('7', '7', '1', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('8', '8', '1', '4.2', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('9', '9', '1', '5', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('10', '10', '1', '5', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('11', '11', '1', '5', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('12', '12', '1', '5', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('13', '13', '1', '5', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('14', '14', '1', '5', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('15', '15', '1', '5', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('16', '16', '1', '5', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('17', '17', '1', '5', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('18', '18', '1', '5', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('19', '19', '1', '5', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('20', '20', '1', '5', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_vote_vote (id, vote_id, catsid, trungbinh, note) VALUES('21', '21', '1', '5', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
