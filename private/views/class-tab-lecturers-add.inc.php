<form method="post" class="form mx-auto " style="width;100%;max-width: 400px;">
	<br><h4>Add Lecturer</h4>
	<input value="<?=get_var('name')?>" autofocus class="form-control" type="text" name="name" placeholder="Lecturer">
	<br>
	<a href="https://exampl/singl_class/<?=$row->class_id?>">
		<button type="button" class="btn btn-danger">Cancel</button>
	</a>
	<button class="btn btn-primary float-end" name="search">Search</button>
	<div class="clearfix"></div>
</form>
<div class="container-fluid">

	<?php if(isset($results) && $results): ?>
			<table class="table table-hover table-striped table-bordered">

				<tr><th>Created by:</th><td><?=esc($row->user->firstname)?> <?=esc($row->user->lastname)?></td>
<?php foreach($results as $row): ?>

				<td>
					<button class="btn btn-sm btn-danger" >add</button>
				</td>
				
				<th>Date Created:</th><td><?=get_date($row->date)?></td>
			</tr>
<?php endforeach ?>
			</table>

			
	<?php else: ?>
			<?php if (count($_POST) >0 ): ?>
		<center><br><h4>No results were found</h4> </center>
			<?php endif ?>
	<?php endif ?>
	
</div>