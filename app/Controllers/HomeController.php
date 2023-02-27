<?php

class HomeController
{
    public $model;

    public function indexAction()
    {
        try
        {
            $shoes = $this->model->getAllShoes();
            $sizes = $this->model->getAllSizes();

            return require_once('../views/home.php');
        }
        catch(Exception $e) { echo 'An error occurred: ' . $e->getMessage(); }
    }

    public function addShoesAction()
    {
        try
        {
            if(isset($_POST['AddShoes']))
            {
                $name = $_POST['name'];
                $us_size = $_POST['us_size'];

                $shoesStatus = $this->model->AddShoes($name, $us_size);
                /*if(isset($shoesStatus))
                {
                    if($shoesStatus == 1)
                    {
                        echo "<script>alert('Shoes successfully added!');</script>";
                    }
    
                    else
                    {
                        echo "<script>alert('Name of shoes already added!');</script>";
                    } 
                }*/
                header("location: home");
                exit;
            }
        }
        catch(Exception $e) { echo 'An error occurred: ' . $e->getMessage(); }
    }
}