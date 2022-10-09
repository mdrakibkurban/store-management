<?php

namespace App\Interfaces;

interface IBrandRepository extends IBaseRepository
{
    public function brandStore($request);
    public function brandUpdate($request,$id);
}
