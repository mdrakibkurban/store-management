<?php

namespace App\Interfaces;

interface ISizeRepository extends IBaseRepository
{

      public function sizeStore($request);

      public function sizeUpdate($request,$id);

}
