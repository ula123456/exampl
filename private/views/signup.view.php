
<?php $this->view('includes/header')?>
	
	<div class="container-fluid">
	<form method="post">
		
		<div class="p-4 mx-auto mr-4 shadow rounded" style="margin-top: 50px;width:100%;max-width: 340px;">
			<h2 class="text-center">My School</h2>
			<img src="../private/views/logo.png" class="border border-primary d-block mx-auto rounded-circle" style="width:100px;">
			<h3>Add User</h3>
			<?php if(count($errors) > 0):?>
			<div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
			  <strong>Errors:</strong>
			   <?php foreach($errors as $error):?>
			  	<br><?=$error?>
			  <?php endforeach;?>
			  <span  type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </span>
			</div>
			<?php endif;?>

			<input class="my-2 form-control" value="<?=get_var('firstname') ?>" type="firstname" name="firstname" placeholder="Frist Name" >
			<input class="my-2 form-control" value="<?=get_var('lastname') ?>"type="lastname" name="lastname" placeholder="Last Name" >
			<input class="my-2 form-control" value="<?=get_var('email') ?>"type="email" name="email" placeholder="Email" >

		

			<select class="my-2 form-control" name="gender">
				<option <?=get_select('gender','')?> value="">--Select a Gender--</option>
				<option <?=get_select('gender','male')?> value="male">Male</option>
				<option <?=get_select('gender','female')?> value="female">Female</option>
			</select>
			<select class="my-2 form-control" name="rang">
				<option <?=get_select('rang','')?> value="">--Select a Rank--</option>
				<option <?=get_select('rang','student')?> value="student">Student</option>
				<option <?=get_select('rang','reception')?> value="reception">Reception</option>
				<option <?=get_select('rang','lecturer')?> value="lecturer">Lecturer</option>
				<option <?=get_select('rang','admin')?> value="admin">Admin</option>
			</select>

			<input class="my-2 form-control" value="<?=get_var('password') ?>"type="text" name="password" placeholder="Password">
			<input class="my-2 form-control" value="<?=get_var('password2') ?>"type="text" name="password2" placeholder="Retype Password">
			<br>
			<button class="btn btn-primary float-end">Add User</button>
			<button class="btn btn-danger">Cancel</button>
		</div>
	</form>
	</div>

<?php $this->view('includes/futer')?>