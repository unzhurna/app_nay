<div class="col-lg-12">
	<div class="table-responsive">
  		<table class="table table-hover table-striped" id="datatable">
			<thead>
				<tr>
					<th>No</th>
					<th>Suplier</th>
					<th>No. Telp</th>
					<th>Alamat</th>
					<th><?php echo anchor('', '<i class="fa fa-plus-circle"></i> Add', 'class="btn btn-xs btn-info"'); ?></th>
				</tr>
			</thead>
			<tbody> 
				<?php foreach($supliers as $row) : ?>           
				<tr>
					<td></td>
					<td><?php echo $row->suplier; ?></td>
					<td><?php echo $row->phone; ?></td>
					<td><?php echo $row->address; ?></td>
					<td>
						<?php
                			echo anchor('tiket/form/'.$row->id, '<i class="fa fa-edit"></i>', 'class="btn btn-xs" title="Edit"');
                			echo '<a href="'.base_url().'tiket/delete_tiket/'.$row->id.'" onclick="return confirmModal(\'Anda akan menghapus??\',\''.base_url().'tiket/delete_tiket/'.$row->id.'\')" class="btn btn-xs" title="Hapus"><i class="fa fa-trash-o"></i></a>'; 
						?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
