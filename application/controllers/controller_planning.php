<?php

class Controller_Planning extends Controller
{
	function __construct()
	{
		$this->model = new Model_Planning();
		$this->view = new View();
	}

	function action_index()
	{
		$data = $this->model->get_data();
		$this->view->generate('planning_view.php', 'template_view.php', $data);
	}
}
