<?php

namespace App\Controllers;

class Dashboard extends MyController
{
    public function index()
    {
        echo $this->adminView('dashboard/index', array(), $this->head);
    }
}
