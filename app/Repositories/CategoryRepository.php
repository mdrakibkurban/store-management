<?php

namespace App\Repositories;

use App\Interfaces\ICategoryRepository;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function categoryStore($request){      
        try {
            $category = $this->model;
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->save();
            flash('Category Create Success')->success();
         } catch (\Throwable $th) {
            flash($th->getMessage())->error();
         }
    }

    public function categoryUpdate($request,$id){
          $category = $this->myFind($id);
            try {
                $category->name = $request->name;
                $category->slug = Str::slug($request->name);
                $category->save();
                flash('Category Update Success')->success();
            } catch (\Throwable $th) {
                flash($th->getMessage())->error();
            }
          
    }
}
