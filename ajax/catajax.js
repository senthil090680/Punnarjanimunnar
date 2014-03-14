var xmlHttp;

function getXMLHttpRequest(){

	var xmlHttp=null;

	try{

		xmlHttp = new XMLHttpRequest();

	   }catch(e){

		try{ 

    		xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");

   		 }catch(e){

   			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");

   		 }

	}

	return xmlHttp;

}



//===========================================select sub================================

function category(id){

	xmlHttp=getXMLHttpRequest();

	if(xmlHttp==null)

	{

		alert("Your browser does not support Ajax");

		return;

	}

	var url="catlist.php";

	url=url+"?catid="+id;

		//	alert(url);

	xmlHttp.onreadystatechange=function(){

	if(xmlHttp.readyState == 0) { document.getElementById('category').innerHTML = "Sending Request..."; }

	if(xmlHttp.readyState == 1) { document.getElementById('category').innerHTML = "Loading..."; }

	if(xmlHttp.readyState == 2) { document.getElementById('category').innerHTML = "Loading..."; }

	if(xmlHttp.readyState == 3) { document.getElementById('category').innerHTML = "Loading..."; }

 

		if (xmlHttp.readyState==4){ 

			document.getElementById("category").innerHTML=xmlHttp.responseText;

		}

	}

	xmlHttp.open("GET",url,true);	

	xmlHttp.send(null);

	return null;

}