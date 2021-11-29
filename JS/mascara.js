    function mascaraTel()
	{

		var telefoneM = document.getElementById("Telefone").value
        
		document.getElementById("Telefone").maxLength = "14"

		if(telefoneM[0] != "(")
		{
			if(telefoneM[0] != undefined)
			{
				document.getElementById("Telefone").value = "(" + telefoneM[0]
			}
		}

		if(telefoneM[3] != ")")
		{
			if(telefoneM[3] != undefined)
			{
				document.getElementById("Telefone").value = telefoneM.slice(0,3) + ")" + telefoneM[3]
			}
		}		

		if(telefoneM[9] != "-")
		{
			if (telefoneM[9] != undefined)
			{
				document.getElementById("Telefone").value = telefoneM.slice(0,9) + "-" + telefoneM[9]
			}
		}
	}

    function mascaraCPF()
	{
		var CPFM = document.getElementById("CPF").value
        
		document.getElementById("CPF").maxLength = "14"

		if(CPFM[3] != ".")
		{
			if(CPFM[3] != undefined)
			{
				document.getElementById("CPF").value = CPFM.slice(0,3) + "." + CPFM[3]
			}
		}

		if(CPFM[7] != ".")
		{
			if(CPFM[7] != undefined)
			{
				document.getElementById("CPF").value = CPFM.slice(0,7) + "." + CPFM[7]
			}
		}		

		if(CPFM[11] != "-")
		{
			if (CPFM[11] != undefined)
			{
				document.getElementById("CPF").value = CPFM.slice(0,11) + "-" + CPFM[11]
			}
		}
	}