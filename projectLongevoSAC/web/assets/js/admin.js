$(function() {
    var currentLocation = window.location.search; 
    $("#form_pagination").show();
    $("#btn_clear").hide(); 
    if(currentLocation != '') { // gamb 1
        $('.nav-tabs li:first-child a').tab('show'); 
        $('.nav-tabs li:eq(1) a').tab('show'); 	         			
        if (currentLocation.length > 14 && currentLocation != "?update=success"){ // gamb 2
         	$("#form_pagination").hide();
         	$("#btn_clear").show();
        } 
    };                          
});
function searchDOM() 
	{		   
		var input, filter, table, tr, td, i;
		input = document.getElementById("inputDOM");
		filter = input.value.toUpperCase();
		table = document.getElementById("results");
		tr = table.getElementsByTagName("tr");
				   
		for (i = 0; i < tr.length; i++) 
		{
			td1 = tr[i].getElementsByTagName("td")[1];
			td2 = tr[i].getElementsByTagName("td")[2];
			if (td1 || td2) 
			{
				if (td1.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1 ) 
				{
				 	tr[i].style.display = "";
				} else 
				{
				 	tr[i].style.display = "none";
			}
		} 
	}
}