<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.js"></script>

<script>
	$(document).ready(function () {
        var oTable = $('#dataTable').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?php  if(isset($source)) echo $source ?>",
            "iDisplayStart ": 10,
            "oLanguage": {
                "sLengthMenu": "_MENU_",
                "sSearch": ""
            },
            "aoColumnDefs": [{
					"bSortable": false,
					"aTargets": [-1]
			}],
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
            "fnDrawCallback": function(oSettings){
				var that = this;
				/* Need to redo the counters if filtered or sorted */
				if ( oSettings.bSorted || oSettings.bFiltered )
				{
					this.$('td:first-child', {"filter":"applied"}).each( function (i) {
						that.fnUpdate( i+1, this.parentNode, 0, false, false );
					});
				}
			}
        });
    });
</script>