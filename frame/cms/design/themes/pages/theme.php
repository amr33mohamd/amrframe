<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> 
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>  

    <!-- x-editable (bootstrap version) -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.6/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.6/bootstrap-editable/js/bootstrap-editable.min.js"></script>
    
     <?php
     $main = new main;
     $main_url = $this->url();
     

     ?>
<script >
	


	$(document).ready(function() {
		 var sections = [];
$( "amrframe" ).each(function( index ) {
  sections.push($(this).attr('class'));

});


    //toggle `popup` / `inline` mode
    $.fn.editable.defaults.mode = 'inline';     
    $(document).click(function(){
    	var sections_count = sections.length ;
    	if(event.target.nodeName == "IMG" ){
		    		$('#myModal').modal('show');
		    		
		    		var src = $(event.target).attr("src");
            
		    	while(sections_count >= 0){
				if($("."+sections[sections_count]+" img[src$='"+src+"']").length ){
					var part = sections[sections_count];
					$(".part").val(part);
          $(".src").val(src);
					break;
				}
				else{
          
					sections_count --;
				}
			}




    	}else{

	

    	while(sections_count >= 0){
		if($("."+sections[sections_count]+":contains("+$(event.target).html()+")").length){
			var part = sections[sections_count];

			break;
		}
		else{
			sections_count --;
		}
	}
    	
    	$(event.target).editable({
    type: 'text',
    pk: $(event.target).html(),
    url: "<?php echo $main_url ?>/recieve_theme_edit",
    title: 'Enter ',
   	name: ""+part,

});
}

});

    })
    //make username editable
    
    
    //make status editable





</script>



<!-- Large modal -->

<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
      <form method="post" id="form2" enctype="multipart/form-data">
        <input type="file" class="fileToUpload" id="fileToUpload" name="fileToUpload">
        <input type="submit" class="btn btn-sm upload" name="submit2"  id="upload" value="upload"/>
        <input type="hidden" class="part" name="part"/>
        <input type="hidden" class="src" name="src"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->