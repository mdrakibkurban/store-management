<?php

namespace App\Interfaces;

interface IProductRepository extends IBaseRepository
{
    public function productGet();
    public function productFind($id);
    public function productDelete($id);
    public function productStore($request);
    public function productUpdate($request,$id);
    
}
