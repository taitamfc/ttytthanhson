
//function check number, allow with lenght
var s = "Lưu ý! Số điện thoại phải đủ 10 chữ số ";

function check_number(event) {
    const input = event.target;
    input.value = input.value.replace(/\D/g, ''); // Remove non-numeric characters


    const phoneNumber = input.value;
    const phoneRegex = /^\d{10}$/; // Regular expression to check if the input contains exactly 10 digits

    if (isNaN(phoneNumber) || phoneNumber.length !== 10) {

    }

    if (phoneRegex.test(phoneNumber)) {
        document.getElementById("error-message").textContent = ""; // Clear error message
    } else {
        document.getElementById("error-message").textContent = s;
    }
}

//func to allow alpha character (A..Z,a..z)
function check_alpha(event) {
    const input = event.target;
    input.value = input.value = input.value.replace(/[0-9]/g, ''); // Allow only alphabetical characters (A-Z, a-z)

    const phoneNumber = input.value;
    const phoneRegex = /^[a-zA-Z]+$/; // Regular expression to check if the input contains only alphabetical characters

    // if (phoneRegex.test(phoneNumber)) {
    //     document.getElementById("error-message").textContent = ""; // Clear error message
    // } else {
    //     document.getElementById("error-message").textContent = "Invalid phone number! Please enter only alphabetical characters.";
    // }
}

//change color button
//document.getElementById("btn1").click();
let activeButton = 1; // Set the initial active button to 1

function changeButtonColor(step) {
  
    var btn = document.querySelector('#btn' + step);
    btn.style.backgroundColor = 'blue';
    btn.style.color = 'white';
    enableNextButton(step);

  
}

function enableNextButton(step) {
  const buttons = document.querySelectorAll('.btn-step');
  buttons.forEach((button, index) => {
    const buttonId = parseInt(button.id.replace('btn', ''));
    button.disabled = buttonId > step + 1;
  });
}



//check all control in form
function check_forms(idform) {
    var myForm = document.getElementById(idform);
    var formElements = Array.from(myForm.elements).filter(
        (element) =>
            element.type === "checkbox" ||
            element.type === "radio" ||
            element.type === "text" ||
            element.tagName.toLowerCase() === "textarea"
    );

    var groups = {};

    // Group checkboxes, radios, text inputs, and textareas by their names
    formElements.forEach((input) => {
        var groupName = input.name;
        if (!groups[groupName]) {
            groups[groupName] = [];
        }
        groups[groupName].push(input);
    });

    var uncheckedGroups = [];

    // Check each group for at least one checked input (checkbox, radio, text, or textarea)
    for (var groupName in groups) {
        var hasChecked = groups[groupName].some((input) => {
            return input.type === "checkbox" || input.type === "radio" ?
                input.checked :
                input.value.trim() !== ""; // For text inputs and textareas, check for non-empty value
        });

        if (!hasChecked) {
            uncheckedGroups.push(groupName);
        }
    }

    if (uncheckedGroups.length > 0) {
        alert("Vui lòng điền đầy đủ các dữ liệu sau, không được để trống : " + uncheckedGroups.join(", "));
    } else {
        // All groups have at least one checked option or non-empty text input/textarea, proceed with further actions here.
        console.log("Dữ liệu đầy đủ!");
    }
}


// Function to check if an element is empty
function isEmpty(elem) {
    var value = elem.val();
    // Check if the value is null or empty
    return value === null || value.trim() === '';

}

// Function to check if at least one radio button in a group is selected
function isRadioGroupSelected(groupName) {
    return $("input[name='" + groupName + "']:checked").length > 0;
}

// Function to check if at least one checkbox in a group is selected
function isCheckboxGroupSelected(groupName) {
    return $("input[name='" + groupName + "']:checked").length > 0;
}

// Function to show the next modal based on the current modal and next modal IDs
function showNextModal2(currentModal, nextModal, step) {
    var currentModalInputs = $(currentModal + " input, " + currentModal + " textarea, " + currentModal + " select");
    var hasEmptyInput = false;

    currentModalInputs.each(function () {
        var inputType = $(this).attr("type");
        var tagName = $(this).prop("tagName").toLowerCase();

        // Check different input types and textarea
        if ((tagName === 'input' && inputType === 'text') ||
            tagName === 'textarea' || tagName === 'select') {
            if (isEmpty($(this))) {
                hasEmptyInput = true;
                return false; // Exit the loop early if an empty input is found
            }
        } else if (inputType === 'radio') {
            var groupName = $(this).attr('name');
            if (!isRadioGroupSelected(groupName)) {
                hasEmptyInput = true;
                return false; // Exit the loop early if no radio button is selected in the group
            }
        } else if (inputType === 'checkbox') {
            var groupName = $(this).attr('name');
            if (!isCheckboxGroupSelected(groupName)) {
                hasEmptyInput = true;
                return false; // Exit the loop early if no checkbox is selected in the group
            }
        }
    });

    // If any input in the current modal is empty, show an alert and prevent the next modal from being shown
   
    //$(currentModal).modal("hide");
    // $(nextModal).modal ({

    //     backdrop: 'static', // Show static backdrop
    //     keyboard: false // Disable keyboard interaction
    //   });
    switch (currentModal) {
        case '#modal1':
            //kiểm tra nút check camkết
            var isChecked = $("#idcheck2").prop('checked');
            if (isChecked) {
                $(currentModal).modal("hide");
                $(nextModal).modal("show");
                changeButtonColor('2');
            } else {
                alert("Bạn chưa đồng ý cam kết! ");

            }

            break;

        case '#modal2':
            //check hình thức báo cáo


            var isChecked = $("#idradiog4").prop("checked") || $("#idradiog3").prop("checked");
            if (isChecked) {
                $(currentModal).modal("hide");
                $(nextModal).modal("show");
                changeButtonColor(step);

            } else {
                alert("Vui lòng điền đầy đủ các dữ liệu, không được để trống!");
                $('#modal2').modal("show");
            }

            break;


        case '#modal18':
            //alert("Modal ID=: " + modalidvalue);
            //kiểm tra nút chọn thông tin đối tượng khác thì cho hiển thị modal19
            var isChecked = $("#idradiog44").prop('checked');
            if (isChecked) {
                $(currentModal).modal("hide");
                $(nextModal).modal("show");
            } else {
                //hiển thị bỏ wa modal19, hiển thị modal20
                $('#modal20').modal('show');
                $(currentModal).modal("hide");
            }

            break;


        case '#modal20':
            changeButtonColor(step);
            //alert(currentModal);
            $(currentModal).modal("hide");
            $(nextModal).modal("show");
            break;

        case '#modal21':
            changeButtonColor(step);
            //alert(currentModal);
            $(currentModal).modal("hide");
            $(nextModal).modal("show");
            break;




        default:

            var isChecked = $("#idradiog4").prop("checked");
            if (isChecked) {
                //alert(isChecked);
                if (hasEmptyInput) {
                    alert("Vui lòng điền đầy đủ các dữ liệu, không được để trống!");
                    break;
                } else {
                    // Show the next modal if all inputs are filled

                }
            }

            changeButtonColor(step);
            //alert(currentModal);
            $(currentModal).modal("hide");
            $(nextModal).modal("show");


            break;
    }

}





