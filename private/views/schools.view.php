
<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
	
	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
		<?php $this->view('includes/crumbs')?>

		

		<div class="card-group justify-content-center">
<table class="table table-striped table-hover">
	<tr><th>School</th> <th>Created by</th><th>Data</th>
		<th>
			<a href="schools/add">
			  <button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</button>
			</a>
		</th>
	</tr>
</table>
			<?php if($rows):?>
					<?php foreach ($rows as $row):?>
				 
				<?php //var_dump($row);?>

	 				<?php endforeach;?>
 			<?php else:?>
 				<h4>No schools members were found at this time</h4>
 			<?php endif;?>
		</div>

		 
	</div>
 

