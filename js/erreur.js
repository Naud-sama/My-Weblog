var champsConnexion;
var champsInscription;

var regexConnexion;
var regexInscription;

function verificationConnexion()
{

	var nombreErreur = 0;

	for(var i = 0; i < champsConnexion.length; i++)
	{
		var regex = new RegExp(regexConnexion[i]);

		if (!regex.test(champsConnexion[i].value))
		{ 
			visibiliter(champsConnexion[i].parentNode.children[1], "visible");
			nombreErreur++;
		}

		else
		{
			visibiliter(champsConnexion[i].parentNode.children[1], "invisible");
		}
	}

	if (nombreErreur > 0)
	{
		return false;
	}
}

function Inscription()
{
	var nombreErreur = 0;

	for(var i = 0; i < champsInscription.length; i++)
	{
		var regex = new RegExp(regexInscription[i]);
		var option = null;

		if (champsInscription[i].id == "mdpConfirmationInscription")
		{
			if (champsInscription[i].value != champsInscription[i - 1].value)
			{
				option = "visible";
				nombreErreur++;
			}

			else
			{
				option = "invisible";
			}

		}

		else
		{

			if (!regex.test(champsInscription[i].value))
			{
				option = "visible";
				nombreErreur++;
			}

			else
			{
				option = "invisible";
			}


			visibiliter(champsInscription[i].parentNode.children[1], option);

		}

	}

	if (nombreErreur > 0)
	{
		return false;
	}
}

function visibiliter(element, visible)
{
	if (visible == "visible")
	{
		element.style.display = "inline";
	}

	else
	{
		element.style.display = "none";
	}
}

function recuperation()
{
	regexConnexion = ["^[A-Za-z0-9]+$", "^[A-Za-z0-9]+$"];
	regexInscription = ["^[A-Za-z]+$", "^[A-Za-z]+$", "[A-Za-z0-9]+", "[A-Za-z0-9]+", "[A-Za-z0-9]+", "[0-9]{4}/[0-9]{2}/[0-9]{2}", "^[A-Za-z0-9._]+@[a-zA-Z]+.[a-zA-Z]{2,3}$"];
	champsConnexion = [document.getElementById("loginConnexion"), document.getElementById("mdpConnexion")];
	champsInscription = [document.getElementById("nomInscription"), document.getElementById("prenomInscription"), document.getElementById("loginInscription"),     document.getElementById("mdpInscription"), document.getElementById("mdpConfirmationInscription"), document.getElementById("dateInscription"), document.getElementById("emailInscription")];
}