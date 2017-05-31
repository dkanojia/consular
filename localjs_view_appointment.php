<script>
$("#name").keyup(function(){
    $("#name").css("background-color", "pink");
   var vl = jQuery(this).val();
  // alert(vl);
	
	$.ajax({url: "ajax_view_appointment_search_name_mobile", data: 'name_mobile='+vl, type: 'POST', success: function(result){
				//alert(result)

				$("#table-data").html(result);
				
			}});
			
			
});
</script>


<script>

// $(function() {
//     $("#datepicker").datepicker();
// 	    $("#datepicker").on("change",function(){
// 	        var selected = $(this).val();
// 	        helloDamit(selected);
// 	    });
// });

// function helloDamit(aa){
// 	//alert(aa);
  
	  
// 	$.ajax({url: "ajax_view_appointment_search_booked_date", data: 'book_date='+aa, type: 'POST', success: function(result){
// 				// alert(result)
// 			$("#table-data").html(result);
				
// 			}});
			
	
// }

// var global_date = date('Y-m-d');
var global_date = new Date();

var dd = global_date.getDate();
var mm = global_date.getMonth()+1; //January is 0!
var yyyy = global_date.getFullYear();
var global_date = mm+'/'+dd+'/'+yyyy;
$(function() {
    $("#datepicker").datepicker();
	    $("#datepicker").on("change",function(){
	        var selected = $(this).val();
	        var global_date = selected;
	        // helloDamit(selected);
	    	var city = document.getElementById("cities").value;
	        dateandCityFunction(selected,city);
	    });
});

function dateandCityFunction(aa,cc){
		  
	$.ajax({url: "ajax_view_appointment_search_booked_date", data: 'book_date='+aa + '&city='+cc, type: 'POST', success: function(result){
				// alert(result)
			$("#table-data").html(result);
				
			}});
			
	
}

function export_excel(){

	// window.open("importerorexporter?date="+date);
	// $.ajax({url: "importerorexporter", type: 'POST', success: function(result){
	// 			// alert("hello");
				
	// }});
	// var selected = '';
	// $(function() {
 //    $("#datepicker").datepicker();
	//     $("#datepicker").on("change",function(){
	//         var selected = $(this).val();
	//     });
	// });
 //    console.log(selected);
    // var selected = document.getElementById("datepicker").value;;
    // alert(global_date);
    final_csv();

}

function final_csv(){
	// window.open("importerorexporter?date="+aa);
	window.open("importerorexporter");
	// $.ajax({url: "importerorexporter", data: 'date='+aa, type: 'POST', success: function(result){
	// 			alert("hello");
				
	// }});	
}

</script>


<script>
$("#passport").keyup(function(){
    $("#passport").css("background-color", "pink");
   var vl = jQuery(this).val();
   //alert(vl);

	$.ajax({url: "ajax_view_appointment_search_passport", data: 'passport='+vl, type: 'POST', success: function(result){
				//alert(result)
				$("#table-data").html(result);
				
			}});
			
});
</script>