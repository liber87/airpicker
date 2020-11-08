<?php
	if ($field_elements=='time') $time = 'data-timepicker="true"';
	if ($field_value){
		if ($field_elements=='time') $value = date('d.m.Y H:i', $field_value);
		else $value = date('d.m.Y', $field_value);
		
	}
?>
<input type="hidden"  name='tv<?=$field_id?>' id='tv<?=$field_id?>' value='<?=$field_value?>'>
<input type="text"  data-value="<?=$value;?>" placeholder="<?=$value;?>"  class="air-datepicker" <?=$time;?>>
<script src="./../assets/tvs/airpicker/datepicker.min.js"></script>
<link rel="stylesheet" href="./../assets/tvs/airpicker/datepicker.min.css"/>
<script>
document.addEventListener('DOMContentLoaded', function(){
	jQuery('.air-datepicker').airdatepicker({		
		onSelect: function(formattedDate, date, inst) {
			var date2 = new Date();
			var offset = (date2.getTimezoneOffset())*60;			
			console.log(offset);
			var msUTC = Date.parse(date); 
			var unixtime = parseInt((msUTC/1000).toFixed()); 
			jQuery(inst.el).prev().val(unixtime);			
		}
	});
	/*jQuery('.datepicker-here').keyup(function(){
		jQuery(this).val(jQuery(this).val().replace(/[^\d.]/g,''));
	});*/	
});
</script>
