<?php

namespace App\Repositories;

use App\Interfaces\ISizeRepository;
use App\Models\Size;

class SizeRepository extends BaseRepository implements ISizeRepository
{
    public function __construct(Size $model)
    {
        parent::__construct($model);
    }

    public function sizeStore($request){
        try {
            $sizes = $this->model;
            $sizes->size = $request->size;
            $sizes->save();
            flash('Size Create Success')->success();
          } catch (\Throwable $th) {
             flash($th->getMessage())->error();
          }
    }


    public function sizeUpdate($request,$id){
        $size = $this->myFind($id);
        try {
            $size->size = $request->size;
            $size->save();
            flash('size Update Success')->success();
        } catch (\Throwable $th) {
            flash($th->getMessage())->error();
        }
        }

}
