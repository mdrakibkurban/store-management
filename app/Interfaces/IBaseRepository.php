<?php

namespace App\Interfaces;

interface IBaseRepository
{

    public function myGet();
    public function getData();
    public function myDelete($id);
    public function myFind($id);

}
