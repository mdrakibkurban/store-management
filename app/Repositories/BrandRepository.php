<?php

namespace App\Repositories;

use App\Interfaces\IBrandRepository;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;

class BrandRepository extends BaseRepository implements IBrandRepository
{
    
    public function __construct(Brand $model)
    {
        parent::__construct($model);
    }

    public function brandStore($request){
          
          try {
            $brand = $this->model;
            $brand->name = $request->name;
            $brand->save();
            flash('Brand Create Success')->success();
          } catch (\Throwable $th) {
             flash($th->getMessage())->error();
          }
    }


    public function brandUpdate($request,$id){

          $brand = $this->myFind($id);
          try {
            $brand->name = $request->name;
            $brand->save();
            flash('Brand Update Success')->success();
        } catch (\Throwable $th) {
            flash($th->getMessage())->error();
        }
    }

  
}
