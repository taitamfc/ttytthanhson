<!-- BEGIN: main -->
<style>
    .form-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-bottom: 1px;
    }

    .form-group {
    margin-right: 15px;
    flex: 1 1 30%;
    }

    .btn {
    margin-right: 15px;
    }

    .list-group-item.active {
    background-color: #007bff;
    color: #fff;
    }

    .list-group {
    width: 15px;
    }
</style>

<form action="{link_frm}" method="post">
  <div class="form-row">
    <div class="form-group">
        <label for="year">Năm đánh giá: </label>     
        <select id="form_check" class="form-control">
            <option selected>Chọn năm đánh giá</option>
            <option>2022</option>
            <option>2023</option>
            <option>2024</option>
            <option>...</option>
      </select>
    </div> 

    <div class="form-group">
        <label for="year">Lần đánh giá: </label>     
        <select id="form_check" class="form-control">
            <option selected>Chọn lần đánh giá</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>...</option>
      </select>
    </div>

    <div class="form-group">
      <label for="form_check">Loại: Thực hành/Chuyên môn</label>
      <select id="form_check" class="form-control">
        <option selected>Chọn loại đánh giá</option>
          <!-- BEGIN: rating_type -->
          <option>{rating_type.name_rating_type}</option>
          <!-- END: rating_type -->
      </select>
    </div>
  </div> <!-- end form-row -->
  
  <div class="form-row">
    <div class="form-group">
      <label for="from_date">Thời gian đánh giá</label>
      <input type="date" class="form-control" id="current_date" >
    </div>    
  </div><!-- end form-row -->

  <div class="form-row">
    <div class="form-group">
    <label for="department">Khoa</label>
    <select id="department" class="form-control">
      <option selected>Chọn Khoa</option>
    <!-- BEGIN: department -->
          <option value="{department.id_department}">{department.id_department}|{department.name_department}</option>
      <!-- END: department -->
    </select>
  </div>
  <div class="form-group">
    <label for="room">Phòng</label>
    <select id="room" class="form-control">
      <option selected>Chọn phòng</option>
          <!-- BEGIN: room -->
          <option value="room.id_room" data-department="{room.id_department}">{room.id_department}|{room.name_room}</option>
          <!-- END: room -->
    </select>
  </div>
</div><!-- end form-row -->

  <div class="form-row">
    <div class="form-group">
      <label for="evaluation_member_leader">Đội trưởng đội đánh giá</label>
	  <select id="evaluation_member_leader" class="form-control"  >
          <!-- BEGIN: evaluation_member -->
          <option>{evaluation_member.full_name} | {evaluation_member.position}</option>
          <!-- END: evaluation_member -->
	  </select>
    <div>
   
   </div>	  
	</div>	
</div><!-- end form-row -->
    <div class="form-group">
    <label id="lbl_content_text">Nội dung đánh giá</label>
    <input type="text" class="form-control" name="content_text" value="{POST.content_text}" id="content_text">
    
    </div>	

    <!-- BEGIN: buttons -->
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    <button type="reset" class="btn btn-danger">Reset</button>
    <!-- END: buttons-->
</form>



<!-- JS -->
<!-- Xử lý 2 combobox Thành phần đánh giá và danh sách lựa chọn  -->
<script>
  var evaluation_member = document.getElementById("evaluation_member");
  evaluation_member.addEventListener("change", function() {
    var selected = "";
    for (var i = 0; i < evaluation_member.options.length; i++) {
      if (evaluation_member.options[i].selected) {
        selected += evaluation_member.options[i].text + " ";
      }
    }
    document.getElementById("selected_team").innerHTML = "Danh sách thành viên được chọn:|"+ selected +"|";
  });
</script>

<script>
  const listA = document.getElementById('evaluation_member');
  const listB = document.getElementById('selected_team');
  let draggedItem = null;
  // Add event listeners for when items in the lists are clicked
  listA.addEventListener('mousedown', dragItem);
  listB.addEventListener('mousedown', dragItem);
  listA.addEventListener('mouseup', dropItem);
  listB.addEventListener('mouseup', dropItem);
  function dragItem(event) {
    draggedItem = event.target;
  }
  function dropItem(event) {
    // If there is no item being dragged, return early
    if (!draggedItem) {
      return;
    }
    // Get the source list and the target list
    const sourceList = draggedItem.parentElement;
    const targetList = sourceList === listA ? listB : listA;

    // If the source and target lists are the same, return early
    if (sourceList === targetList) {
      draggedItem = null;
      return;
    }
    // Add the dragged item to the target list
    targetList.appendChild(draggedItem);
    // Reset the dragged item variable
    draggedItem = null;
  }
</script>
<!-- Xử lý 2 combobox department, room  -->
<script>
    // Lấy tất cả các option của combobox Phòng
    var roomOptions = document.getElementById("room").options;
    // Lấy giá trị được chọn của combobox department và duyệt qua tất cả các option của combobox Phòng
    document.getElementById("department").addEventListener("change", function() {
        var selecteddepartment = this.value;
        // Duyệt qua tất cả các option của combobox Phòng
        for (var i = 0; i < roomOptions.length; i++) {
            var roomOption = roomOptions[i];
            // Nếu option có thuộc tính data-department khớp với department được chọn
            if (roomOption.getAttribute("data-department") == selecteddepartment || selecteddepartment == "") {
                // Hiển thị option
                roomOption.style.display = "block";
            } else {
                // Ẩn option
                roomOption.style.display = "none";
            }
        }
        // Reset giá trị của combobox Phòng về giá trị mặc định
        document.getElementById("room").selectedIndex = 0;
    });
</script>

  

<!-- END: main -->