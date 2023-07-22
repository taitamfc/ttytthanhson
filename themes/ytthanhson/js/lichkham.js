function ValidateFrmContact(a){
	var name=document.myform.name; 
	var phone=document.myform.phone; 
	var ph=/^[0-9]+$/;var 
	city=document.myform.city;
	if (name.value==""){window.alert("Vui lòng nhập họ tên đầy đủ."); name.focus(); return false;}
	if (phone.value==""){window.alert("Vui lòng nhập số điện thoại."); phone.focus(); return false;}
	if (!ph.test(phone.value)){window.alert("Vui lòng nhập số điện thoại kiểu số"); phone.focus(); return false;}
	if(phone.value<=99999999||phone.value>999999999){window.alert("Vui lòng nhập số điện thoại chính xác.");phone.focus();return false;}
	
	var c = []; 
		c.type = $(a).prop("method"); c.url = $(a).prop("action"); c.data = $(a).serialize();
		$(a).find("input,button,select,textarea, a").removeClass("has-error");
		$(a).find("input,button,select,textarea, a").prop("disabled", !0);
		$.ajax({
				url : c.url,
				cache: !1,
				data:c.data,
				type : c.type,
				dataType : 'json',
				success : function (result){
				alert(result.mess);$(a).find("input,button,select,textarea, a").prop("disabled", !1);
				if(result.sta == "ok") window.location =result.url;
				}
			});
		return !1;	
}