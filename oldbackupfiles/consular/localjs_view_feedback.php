<!------localjs_view_feedback--------->
<script>
$("#table_search_name").keyup(function(){
    $("#table_search_name").css("background-color", "pink");
   var vl = jQuery(this).val();
				

	$.ajax({url: "ajax_view_feedback_search_name", data: 'name='+vl, type: 'POST', success: function(result){

				$("#table-data").html(result);
			}});
});
</script>

<script>
$("#table_search_mobile").keyup(function(){
    $("#table_search_mobile").css("background-color", "pink");
   var vl = jQuery(this).val();
   				

	$.ajax({url: "ajax_view_feedback_search_mobile", data: 'mobile='+vl, type: 'POST', success: function(result){
				$("#table-data").html(result);
			}});
});
</script>

<script>
$("#table_search_email").keyup(function(){
    $("#table_search_email").css("background-color", "pink");
   var vl = jQuery(this).val();
   				

	$.ajax({url: "ajax_view_feedback_search_email", data: 'email='+vl, type: 'POST', success: function(result){
				$("#table-data").html(result);
			}});
});
</script>