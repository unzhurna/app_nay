<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-user"></i> User Profile</h3>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<?php echo form_open('auth/profile/'.$id, 'class="form-horizontal"')?>
							<div class="form-group">
								 <label class="col-lg-4">Nama</label>
								<div class="col-md-8">
									<?php
										echo form_input(array('name'=>'nama', 'class'=>'form-control', 'value'=>set_value('nama', $nama)));
										echo form_error('nama');
									?>
								</div>
							</div>
							<div class="form-group">
								 <label class="col-lg-4">Username</label>
								<div class="col-md-8">
									<?php
										echo form_input(array('name'=>'username', 'class'=>'form-control', 'value'=>set_value('username', $username)));
										echo form_error('username');
									?>
								</div>
							</div>
							<div class="form-group">
								 <label class="col-lg-4">Password <span class="text-danger">*</span></label>
								<div class="col-md-8">
									<?php
										echo form_password(array('name'=>'password', 'class'=>'form-control'));
										echo form_error('password');
									?>
								</div>
							</div>
							<div class="form-group">
								 <label class="col-lg-4">Conf. Password <span class="text-danger">*</span></label>
								<div class="col-md-8">
									<?php
										echo form_password(array('name'=>'passconf', 'class'=>'form-control'));
										echo form_error('passconf');
									?>
								</div>
							</div>
							<div class="pull-left"><span class="text-danger">*</span> Isi untuk mengganti password</div>
							<button type="submit" class="btn btn-info pull-right"><i class="fa fa-check-circle"></i> Simpan</button>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
