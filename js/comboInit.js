function comboInit(thelist)
{
	theinput = document.getElementById(the input);
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
	if(theinput.value == "")
		theinput.value = content;
}

