<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="<?php echo base_url('media'); ?>/js/jquery-1.10.2.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php echo base_url('media'); ?>/bs3/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url('media'); ?>/js/smooth-sliding-menu.js"></script> 
<script type="text/javascript" src="<?php echo base_url('media'); ?>/plugins/input-mask/demo-mask.js"></script> 
<script type="text/javascript" src="<?php echo base_url('media'); ?>/plugins/input-mask/jquery.inputmask.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('media'); ?>/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
<script type="text/javascript" src="<?php echo base_url('media'); ?>/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script> 
<script type="text/javascript" src="<?php echo base_url('media'); ?>/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script> 
<script type="text/javascript" src="<?php echo base_url('media'); ?>/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script> 
<script type="text/javascript" src="<?php echo base_url('media'); ?>/plugins/jquery-multi-select/js/jquery.multi-select.js"></script> 
<script type="text/javascript" src="<?php echo base_url('media'); ?>/plugins/jquery-multi-select/js/jquery.quicksearch.js"></script> 
<script type="text/javascript" src="<?php echo base_url('media'); ?>/js/form-components.js"></script> 
<script type="text/javascript" src="<?php echo base_url('media'); ?>/plugins/ckeditor/ckeditor.js"></script> 
<script type="text/javascript" src="<?php echo base_url('media'); ?>/plugins/tag-input/jquery.tagsinput.js"></script> 
<script type="text/javascript" src="<?php echo base_url('media'); ?>/plugins/tag-input/taginput-edit.js"></script> 
<script type="text/javascript" src="<?php echo base_url('media'); ?>/plugins/icheck/icheck.js"></script> 

<!--Data Table JS -->
<script src="<?php echo base_url('media'); ?>/plugins/data-tables/DT_bootstrap.js"></script> 
<script src="<?php echo base_url('media'); ?>/plugins/data-tables/jquery.dataTables.js"></script> 
<!--script src="<?php echo base_url('media'); ?>/plugins/data-tables/dynamic_table_init.js"></script-->

<?php $this->load->view('additional/dynamic_table'); ?>	

<!--script>
$(document).ready(function(){
    $(document).on("contextmenu",function(e){
        //if(e.target.nodeName != "INPUT" && e.target.nodeName != "TEXTAREA")
             e.preventDefault();
     });
 });
</script>
<script>
            document.onkeypress = function (event) {
                event = (event || window.event);
                if (event.keyCode == 123) {
                    return false;
                }
            }
            document.onmousedown = function (event) {
                event = (event || window.event);
                if (event.keyCode == 123) {
                    return false;
                }
            }
            document.onkeydown = function (event) {
                event = (event || window.event);
                if (event.keyCode == 123) {
                    return false;
                }
            }
        </script-->
