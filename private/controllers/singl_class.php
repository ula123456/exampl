
<?php

/**
 * singl_ controller
 */
class singl_class extends Controller
{
	
	function index($id ='')
	{
		// code...

		
		$classes = new classes_model(); 
		$query="select * from classes where class_id = '$id'";
		$row = $classes->first2($query);
		

		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['classes','classes'];

		
		if($row){
			$crumbs[] = [$row->class,''];
		}

		$page_tab= isset($_GET['tab'])?$_GET['tab']:'lecturers';
		$this->view('singl_class',[
			'row'=>$row,
			'crumbs'=>$crumbs,
			'page_tab'=>$page_tab,
		]);
	}
}
