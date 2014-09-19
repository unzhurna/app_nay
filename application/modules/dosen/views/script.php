<script src="<?php echo base_url(); ?>assets/js/plugins/jquery.responsivetables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/jquery.datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/jquery.datatables.extend.min.js"></script>
<script>

        
        $(document).ready(function() {
				/* dataTable ajax Example
				 * #table4
				/*====================================================================*/
				var static_number=0;
				var oTable = $('#table').dataTable({
					"bServerSide"  : true,	
					"bProcessing": true,
					"sAjaxSource": "<?php  if(isset($source)) echo $source ?>",
					"aoColumnDefs": [{
                "aTargets": [0]
            }],
		
            "oLanguage": {
                "sLengthMenu": "_MENU_",
                "sSearch": "",
                "oPaginate": {
                    "sPrevious": "",
                    "sNext": ""
                }
            }
        
	
				});
				
			});
    
    </script>