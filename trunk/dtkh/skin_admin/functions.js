function setLocation(url)
{
	window.location = url;
}

function exportFile(url)
{
	var value = document.getElementById("export").value;
	window.open('index.php?rt=admin/'+url+'&type='+value);
}