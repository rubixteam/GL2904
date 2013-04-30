/////////////Pour l'instanciaion du XMLHttpRequest selon le navigateur//////////
var XmlHttpVersions = new Array('MSXML2.XMLHTTP.6.0','MSXML2.XMLHTTP.5.0','MSXML2.XMLHTTP.4.0','MSXML2.XMLHTTP.3.0','MSXML2.XMLHTTP','Microsoft.XMLHTTP');

function getXMLHttpRequest(){
	var xmlHttpRequest; //pour communiquer avec le serveur : XML http request object
	try{
		xmlHttpRequest = new XMLHttpRequest(); //Instantiation pour Firefox, Safari, Chrome & Opera
	}catch(e1){ // Instantiation pour Internet Explorer
		for(var i=0; i<XmlHttpVersions.length && !xmlHttpRequest;i++){
			try{
				xmlHttpRequest = new ActiveXObject(XmlHttpVersions[i]); 
			}catch(e2){
			}
		}
	}
	if(!xmlHttpRequest){
		alert('Your browser can\'t handle this AJAX script');
	}
	return xmlHttpRequest;
}
////////////////////////////////////////////////:::::::::::::::::::::::::::
function check(){
	xmlHttpRequest = getXMLHttpRequest();
    if (xmlHttpRequest != null) {
////////////////////////////////////Envoi de la requete//////////////////////////////////////////////
		var loginRec = document.getElementById("loginform").value;
		xmlHttpRequest.open("GET", "inscription-produit.php?verif=true&login="+loginRec, true);//etat : 1
        xmlHttpRequest.send(null); //etat : 2
/////////////////////////////Pour définir le traitement de la réponse du serveur///////////////////////		
        xmlHttpRequest.onreadystatechange = checkLogin;
    }
}


function checkLogin(){
	if(xmlHttpRequest.readyState == 4){
		try{
			
			var tabLogins = xmlHttpRequest.responseXML.getElementsByTagName("login");
			if(tabLogins.item(0)){
				window.document.getElementById("mention").innerHTML = "Produit Existant";
				window.document.getElementById("checkState").value = "false";
			}else{
				window.document.getElementById("mention").innerHTML = ""; //c'est bon
				window.document.getElementById("checkState").value = "true";
			}
			
		}catch(e){
			alert(e);
		}		
	}
	
}


function checkValidate(){
	var checkStateRec = window.document.getElementById("checkState").value;
	if (checkStateRec == "true"){
		xmlHttpRequest = getXMLHttpRequest();
    	if (xmlHttpRequest != null) {
		////////////////////////////////////Envoi de la requete//////////////////////////////////////////////
		var loginRec = document.getElementById("loginform").value;
		var pwdRec = document.getElementById("pwdform").value;
		var versionRec=document.getElementById("versionform").value;
		var etatRec=document.getElementById("etatform").value;
		xmlHttpRequest.open("GET", "inscription-produit.php?verif=false&login="+loginRec+"&pwd="+pwdRec+"&ver="+versionRec+"&et="+etatRec, true);
        xmlHttpRequest.send(null); 
/////////////////////////////Pour définir le traitement de la réponse du serveur///////////////////////		
        xmlHttpRequest.onreadystatechange = validateResponse;
    }		
	}else{
		alert('Produit Existant');
	}
}

function validateResponse(){
	alert(xmlHttpRequest.responseXML.getElementsByTagName("message").item(0).firstChild.nodeValue);
}