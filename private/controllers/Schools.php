<?php 

/**
 * 
 */

class Schools extends Controller
{
	
	function index()
	{
		if (!Auth::logged_in()) 
		{
			$this->redirect('login');
		}
		
		$school = new school();
		
		$data = $school->findAll();
		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Schools','schools'];
		
		$this->view('schools',[
			
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
			$school = new school();
//echo "<pre>";var_dump($school);
			if ($school->validate($_POST)) 
			{
				$_POST['date'] = date("Y-m-d H:i:s");
			
				$school->insert($_POST);
			
				$this->redirect('schools');
			}else{	//erorrs
				$errors = $school->errors;
			}

		}
		
		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Schools','schools'];
		$crumbs[] = ['Add','schools/add'];

		$this->view('schools.add',[
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
		$school = new school();
		$errors= array();

		if (count($_POST) > 0) 
		{
			
//echo "<pre>";var_dump($school);
			if ($school->validate($_POST)) 
			{
				$school->update($id,$_POST);
			
				$this->redirect('schools');
			}else{	//erorrs
				$errors = $school->errors;
			}

		}
		
		$row = $school ->where('id',$id);
		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Schools','schools'];
		$crumbs[] = ['Edit','schools/edit'];

		$this->view('schools.edit',[
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
		$school = new School();
		$errors= array();

		if (count($_POST) > 0) 
		{
			
			$school->delete($id);
			
			$this->redirect('schools');
			
		}
		$row = $school->where('id',$id);

 		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Schools','schools'];
		$crumbs[] = ['Delete','schools/delete'];

		$this->view('schools.delete',[
			'row'=>$row,
 			'crumbs'=>$crumbs,
		]);
		
	}
}