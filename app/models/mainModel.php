<?php 

require_once __DIR__.'/../core/Model.php';

class mainModel extends Model
{
    public function getData()
    {
        return [
			"name" => "Alex",
			"age" => 22
		];
    }
}
