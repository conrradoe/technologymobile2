$(document).ready(function(){
	$("#errorMsg").hide();
	$("#btnLogin").click(function(){
		var usu = $("#txtuser").val();
		var pass = $("#txtpassword").val();
		$.post("http://sinergiasms.no-ip.org:8080/technologymobile2/server/login.php",{ usu : usu, pass : pass},function(respuesta){
			if (respuesta == "true") {
        		//$.mobile.changePage("otro.html");
				window.location.href="otro.php?usu="+usu;												 
																	 
        	}
        	else{
        		$.mobile.changePage('#pageError', 'pop', true, true);
        		/*$("#errorMsg").fadeIn(300);
        		$("#errorMsg").css("display", "block");*/
        	}
		});
    });
});