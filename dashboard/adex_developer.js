function verifyNetwork(){
    var selNetwork=$('#network').find(":selected").attr('networkname');
	var verNetwork="";
	var phoneT = document.getElementById('phone').value;
	var phoneStr = phoneT.substr(0,4);
	
	if(phoneT==="" || phoneT.length<6)
	{
		document.getElementById('verifyer').innerHTML = "";
	}
	else{
	if(/0702|0704|0803|0806|0703|0706|0813|0816|0810|0814|0903|0906|0913/.test(phoneStr))
	{
		verNetwork="MTN";
	}
	else if(/0805|0807|0705|0815|0811|0905/.test(phoneStr))
	{
		verNetwork="GLO";
	}
	else if(/0702|0704|0803|0806|0703|0706|0813|0816|0810|0814|0903|0906|0913/.test(phoneStr))
	{
		verNetwork="GIFTING";
	}
	else if(/0802|0808|0708|0812|0701|0901|0902|0907|0912/.test(phoneStr))
	{
		verNetwork="AIRTEL";
	}
	else if(/0809|0818|0817|0908|0909/.test(phoneStr))
	{
		verNetwork="9MOBILE";
	}
	else if(/0804/.test(phoneStr))
	{
		verNetwork="NTEL";
	}
	else
	{
		verNetwork="Unable to identify network !";
	}
	if (selNetwork=="ETISALAT") {
			selNetwork="9MOBILE";}
			
		if (verNetwork==selNetwork)
		{
			var ic = "<i class = 'fas fa-check-circle' style ='color: #4BB543;'></i>";
		}
		else 
		{
			ic = "<i class = 'fas fa-exclamation-triangle' style ='color:#B33A3A'></i>";
		}
	
	document.getElementById('verifyer').innerHTML = "Network is: <b>"+verNetwork+"  "+ic+"</b><br><i><b> NB: </b> Ignore this warning for <b>Ported Numbers</b></i>";
}}
