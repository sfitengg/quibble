
$("#year_select").change(function(){
	console.log("Year changed")
	var year1,year2;
	switch($(this).val()){
		case "1":
			year1 = 1;
			year2 = 2;
			update_semester(year1,year2)
			console.log("Year 1 selected")
			
			break;
		case "2":
			year1 = 3;
			year2 = 4;
			update_semester(year1,year2)
		
			break;
		case "3":
			year1 = 5;
			year2 = 6;
			update_semester(year1,year2)
		
			break;
		case "4":
			year1 = 7;
			year2 = 8;
			update_semester(year1,year2)
			break;
	}
 	
});

var update_semester = function(year1,year2){
	$('#semester_select').empty();
	$('#semester_select').append("<option> "+year1+" </option>");		
	$('#semester_select').append("<option>"+year2+"</option>");	
	$('select').material_select();	
}
