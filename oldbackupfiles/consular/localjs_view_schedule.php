<script>



function delete_holiday(aa){
	
	$.ajax({url: "ajax_view_schedule_delete_holiday", data: 'id='+aa, type: 'POST', success: function(result){
				//$("#table-data").html(result);
				if(result){
					alert("Data Deleted successful!");
				}

			}});
}




$("#s_passport").keyup(function(){
    $("#s_passport").css("background-color", "pink");
   var vl = jQuery(this).val();
	$.ajax({url: "ajax_view_schedule_search_by_passport", data: 'id='+vl, type: 'POST', success: function(result){
				//$("#table-data").html(result);
				

			}});
});

$("#s_mobile").keyup(function(){
    $("#s_mobile").css("background-color", "pink");
	   var vl = jQuery(this).val();

	$.ajax({url: "ajax_view_schedule_search_by_mobile", data: 'id='+vl, type: 'POST', success: function(result){
				//$("#table-data").html(result);
				

			}});
});

$("#s_name").keyup(function(){
    $("#s_name").css("background-color", "pink");
   var vl = jQuery(this).val();
	$.ajax({url: "ajax_view_schedule_search_by_name", data: 'id='+vl, type: 'POST', success: function(result){
				//$("#table-data").html(result);
				
			}});
});
</script>


<script>
$("#name").keyup(function(){
    $("#name").css("background-color", "pink");
   var vl = jQuery(this).val();
   alert(vl);
	
	  /*
	$.ajax({url: "ajax_view_schedule_search_by_name", data: 'id='+vl, type: 'POST', success: function(result){
				//$("#table-data").html(result);
				
			}});
			
			*/
});
</script>




<script>
$("#datepicker").keyup(function(){
    $("#datepicker").css("background-color", "pink");
   var vl =  $("#datepicker input").datepicker("getDate");

   alert(vl);
	
	  /*
	$.ajax({url: "ajax_view_schedule_search_by_name", data: 'id='+vl, type: 'POST', success: function(result){
				//$("#table-data").html(result);
				
			}});
			
	*/
});
</script>


<script>
$("#passport").keyup(function(){
    $("#passport").css("background-color", "pink");
   var vl = jQuery(this).val();
   alert(vl);

	  /*
	$.ajax({url: "ajax_view_schedule_search_by_name", data: 'id='+vl, type: 'POST', success: function(result){
				//$("#table-data").html(result);
				
			}});
			
			*/
});
</script>