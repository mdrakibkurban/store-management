<?php

namespace App\Interfaces;

interface IProductRepository extends IBaseRepository
{
    public function productStore($request);
    
}
