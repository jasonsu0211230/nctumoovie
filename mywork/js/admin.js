/**
 * @author jasonsu0211230
 */
$(document).ready(function(){
	$("a.del").on("click", function(){
		var yes_or_no = confirm("確定刪除?");
		
		if(yes_or_no){
			
		}
		else{
			return false;
		}
	});
	
});


