<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.js"></script>

<script>
	$(document).ready(function () {
        var oTable = $('#dataTable').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?php  if(isset($source)) echo $source ?>",
            "iDisplayStart ": 10,
            "aoColumnDefs": [{
                "aTargets": [0]
            }],
            "oLanguage": {
                "sLengthMenu": "_MENU_",
                "sSearch": ""
            },
            "aoColumn": [
            	null,
            	null,
            	null,
            	{"bSortable":false, "sClass": "center"}
			],
			'fnServerData': function (sSource, aoData, fnCallback) {
                $.ajax
                ({
                    'dataType': 'json',
                    'type': 'POST',
                    'url': sSource,
                    'data': aoData,
                    'success': fnCallback
                });
          },
           "fnDrawCallback": function ( oSettings) {
					
						for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
						{
							var _id=$('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).text();
							var status=$('td:eq(4)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).text();
							var title=$('td:eq(3)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).text();
							var teaser='<b>'+title+'</b><br>'+oSettings.aoData[i]._aData[5];
							var content_html='<a rev="'+teaser+'" href="javascript:void(0)" onclick="load_artikel('+_id+')" class="vtip">'+title+'</a>';
							
							$('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( static_number+1 );
							$('td:eq(3)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( content_html );
							
							
							
							static_number=static_number+1;
						}
						
					
				},
        });
    });
</script>