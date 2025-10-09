<?php 

/**
 * 
 */

class Classes extends Controller
{
	
	function index()
	{
		if (!Auth::logged_in()) 
		{
			$this->redirect('login');
		}
		
		$classes = new classes_model;		
		$data = $classes->findAll();
		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Classes','classes'];
		
		$this->view('classes',[
			
			'crumbs'=>$crumbs,
			'rows'=>$data
			]);
		
	}
	function add()
	{
		if (!Auth::logged_in()) 
		{
			$this->redirect('login');
		}
		$errors= array();
		if (count($_POST) > 0) 
		{
			$classes = new classes_model();
//echo "<pre>";var_dump($classes);
			if ($classes->validate($_POST)) 
			{
				$_POST['date'] = date("Y-m-d H:i:s");
			
				$classes->insert($_POST);
			
				$this->redirect('classes');
			}else{	//erorrs
				$errors = $classes->errors;
			}

		}
		
		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Classes','classes'];
		$crumbs[] = ['Add','classes/add'];

		$this->view('classes.add',[
			'errors'=>$errors,
			'crumbs'=>$crumbs
		
		]);
		
	}
	function edit($id=null)
	{
		if (!Auth::logged_in()) 
		{
			$this->redirect('login');
		}
		$classes = new classes_model();
		$errors= array();

		if (count($_POST) > 0) 
		{
			
//echo "<pre>";var_dump($school);
			if ($classes->validate($_POST)) 
			{
				$classes->update($id,$_POST);
			
				$this->redirect('classes');
			}else{	//erorrs
				$errors = $classes->errors;
			}

		}
		
		$row = $classes ->where('id',$id);
		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Classes','classes'];
		$crumbs[] = ['Edit','classes/edit'];

		$this->view('classes.edit',[
			'row'=>$row,
			'errors'=>$errors,
			'crumbs'=>$crumbs
		
		]);
		
	}
	function delete($id=null)
	{
		if (!Auth::logged_in()) 
		{
			$this->redirect('login');
		}
		$classes = new classes_model();
		$errors= array();

		if (count($_POST) > 0) 
		{
			
			$classes->delete($id);
			
			$this->redirect('classes');
			
		}
		$row = $classes->where('id',$id);

 		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Classes','classes'];
		$crumbs[] = ['Delete','classes/delete'];

		$this->view('classes.delete',[
			'row'=>$row,
 			'crumbs'=>$crumbs,
		]);
		
	}
}