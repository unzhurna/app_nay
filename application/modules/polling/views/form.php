<div class="col-lg-12">
	<div class="box">
		<header class="dark">
			<div class="icons">
				<i class="fa fa-edit"></i>
			</div>
			<h5>Form Dosen</h5>
		</header>
		<div class="body">
			<?php echo form_open('dosen/post/'.$id, 'class="form-horizontal"'); ?>
				<div class="form-group">
					<label class="control-label col-lg-2">NDN<span class="text-danger">*</span></label>
					<div class="col-lg-4">
						<?php echo form_input(array('name'=>'ndn', 'class'=>'form-control', 'value'=>set_value('ndn', $ndn))); ?>
					</div>
					<span class="text-danger col-lg-6"><?php echo form_error('ndn'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2">Nama<span class="text-danger">*</span></label>
					<div class="col-lg-4">
						<?php echo form_input(array('name'=>'nama', 'class'=>'form-control', 'value'=>set_value('nama', $nama))); ?>
					</div>
					<span class="text-danger col-lg-6"><?php echo form_error('nama'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2">Jurusan<span class="text-danger">*</span></label>
					<div class="col-lg-4">
						<?php echo form_dropdown('id_jurusan', $opt_jurusan, set_value('id_jurusan', $id_jurusan), 'class="form-control"'); ?>
					</div>
					<span class="text-danger col-lg-6"><?php echo form_error('id_jurusan'); ?></span>
				</div>
				<div class="form-actions">
					<button class="btn btn-info" id="yy" type="submit"><i class="fa fa-check-circle"></i> Simpan</button>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>