<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Apply;
use App\Repositories\ApplyRepository;

class ApplyController extends Controller
{
    private $apply;

    public function __construct(ApplyRepository $apply)
    {
      $this->apply = $apply;
    }

    public function getAllapplies()
    {
       $applies = $this->apply->getAll();
       return response()->json(compact('applies'), 200);
    }


    public function getapply($apply_id)
    {
      $apply = $this->apply->getById($apply_id);

      return response()->json(compact('apply'), 200);
    }

    public function storeapply($job_id,Request $request)
    {  // cek role student?
      $attributes = $request->all();
      $attributes['job_id']=$job_id;
      $a =$this->article->create($attributes);
      return response()->json(compact('apply'), 200);
    }

    public function updateapply($apply_id, Request $request)
    {
      $attributes = $request->all();
      $apply = $this->apply->update($apply_id, $attributes);
      $apply = $this->apply->getById($apply_id);

      return response()->json(compact('apply'), 200);
    }

    /**
     * Delete a apply
     * @var integer $apply_id
     *
     * @return mixed
     */
    public function deleteapply($apply_id)
    {
      $apply = $this->apply->destroy($apply_id);

      return response()->json(compact('apply'), 200);
    }
  }
