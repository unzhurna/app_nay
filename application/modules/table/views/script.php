<script src="<?php echo base_url(); ?>assets/js/plugins/jquery.responsivetables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/jquery.datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/jquery.datatables.extend.min.js"></script>
<script>

        
        $(document).ready(function() {
				/* dataTable ajax Example
				 * #table4
				/*====================================================================*/
				var static_number=0;
				var display_length=10;
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
            },
            "aaSorting": [
                [1, 'asc']
            ],
            // set the initial value
            "iDisplayLength": 10,
			      "fnServerData": function(sSource, aoData, fnCallback)
              {
                $.ajax(
                      {
                        "dataType": "json",
                        "type"  : "POST",
                        "url"    : sSource,
                        "data"  : aoData,
                        "success" : function (data) {
						static_number=Number(data.iDisplayStart);
							fnCallback(data)
						}
                      }
                  );
              },
			  
			  "fnDrawCallback": function ( oSettings) {
					
						/*for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
						{
							var status=$('td:eq(3)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).text();
							$('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( static_number+1 );
							if(status=='0')
							{
								$('td:eq(3)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html('<span class="label label-sm label-danger">Unpublished</span>');	
							}
							else
							{
								$('td:eq(3)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html('<span class="label label-sm label-success">Published</span>');	
							}
							
							static_number=static_number+1;
						}
						$('.tooltips').tooltip();*/
					
				},
				});
				
			});
    
    </script>