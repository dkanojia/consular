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
function helloDamit(aa){
	//alert(aa);
  
	  
	$.ajax({url: "ajax_view_appointment_search_booked_date", data: 'book_date='+vl, type: 'POST', success: function(result){
				alert(result)
			$("#table-data").html(result);
				
			}});
			
	
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