<?php 

require_once __DIR__.'/../core/Controller.php';
require_once __DIR__.'/../models/mainModel.php';

class mainController extends Controller
{

    public $data;

    public function return()
    {
        $this->model = new mainModel();
        $this->data = $this->model->getData();
        $this->view->render('main.php', $this->data);
    }

}