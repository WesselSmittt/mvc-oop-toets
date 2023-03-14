<?php

class Zangeres extends BaseController
{
    private $zangeresModel;

    public function __construct()
    {
        $this->zangeresModel = $this->model('ZangeresModel');
    }

    public function index()
    {
        $data = [
            'title' => 'Overzicht landen van de wereld'
        ];

        $this->view('zangeres/index', $data);
    }


    public function getCountries($id1=NULL, $id2=NULL) 
    {
        $countries = $this->zangeresModel->getCountries();

        $tableRows = "";
        foreach ($countries as $value) {
            $tableRows .= "<tr>
                                <td>$value->Id</td>
                                <td>$value->Name</td>
                           </tr>";
        }

        $data = [
            'title' => 'Overzicht landen van Europa',
            'tableRows' => $tableRows
        ];

        $this->view('zangeres/getCountries', $data);
    }
}