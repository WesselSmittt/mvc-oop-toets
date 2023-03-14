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
            'title' => 'Overzicht zangeressen'
        ];

        $this->view('zangeres/index', $data);
    }


    public function getZangeres() 
    {
        $zangeres = $this->zangeresModel->getZangeres();

        $tableRows = "";
        foreach ($zangeres as $value) {
            $tableRows .= "<tr>
                                <td>$value->Id</td>
                                <td>$value->Name</td>
                                <td>$value->NettoWaarde</td>
                                <td>$value->Land</td>
                                <td>$value->Mobiel</td>
                                <td>$value->Leeftijd</td>
                           </tr>";
        }

        $data = [
            'title' => 'Overzicht zangeressen',
            'tableRows' => $tableRows
        ];

        $this->view('zangeres/getZangeres', $data);
    }
}