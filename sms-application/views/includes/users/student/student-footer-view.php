 </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
   <div id="footer">
		<div id="block_load">
			<img id="loadingimg" src="<?php echo base_url(); ?>contents/js/img/loader.gif">
		</div>
       2013 &copy; Admin Lab Dashboard.
      <div class="span pull-right">
         <span class="go-top"><i class="icon-arrow-up"></i></span>
      </div>
   </div>
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS -->    
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <?php $add_js = AccessJS($this->uri->segment(2));
	if(isset($add_js)) {
		if(is_array($add_js)){
			foreach($add_js as $js)
				echo '<script src="'.base_url().$js.'" ></script>'."\n";
		} else 
			echo '<script src="'.base_url().$add_js.'" ></script>'."\n";
	} 
	?>
	<script type="text/javascript">
		$(".chzn-select").chosen(); 
		$(".chzn-select-deselect").chosen({allow_single_deselect:true});
	</script>
	<script type="text/javascript">
	  $(document).ready(function(){
		  $(".event_request").click(function(){
			$("#event_title").text($(this).attr("title"));
			$(".event_response").hide();
			event_id = $(this).attr("class").split(' ')[1];
			$("#"+event_id).show();
		  })  
	  });
	</script>
</body>
<!-- END BODY -->
</html>