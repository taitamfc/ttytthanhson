
//function check number, allow with lenght
var s ="Lưu ý! Số điện thoại phải đủ 10 chữ số "; 

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

