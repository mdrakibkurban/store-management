<?php

namespace App\Repositories;

use App\Interfaces\IBaseRepository;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function myGet()
    {
        return $this->model->latest()->get();
    }

    public function myDelete($id)
    {
        $data =$this->model->find($id);
        if(!$data){
            flash('Data not found')->error();
        }else{
            $data->delete();
            flash('Successfully Deleted')->success();
        }
      
    }

    public function myFind($id){
        $data =$this->model->find($id);
        if(!$data){
            return null;
            flash('Data Not Found')->error();
        }else{
            return $data;
        }
    }
}
