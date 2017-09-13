<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Repositories\ContractRepository;
class ContractController extends Controller
{
  private $contract;

   public function __construct(ContractRepository $contract)
   {
     $this->contract = $contract;
   }

   public function getAllContract()
   {
      $contracts = $this->contract->getAll();
      return response()->json(compact('contracts'), 200);
   }


   public function getcontractDetail($contract_id)
   {
     $contract = $this->contract->getById($contract_id);

     return response()->json(compact('contract'), 200);
   }

   public function storecontract(Request $request)
   {
     $attributes = $request->all();
     $contract =$this->contract->create($attributes);
     return response()->json(compact('contract'), 200);
   }

   public function updatecontract($contract_id, Request $request)
   {
     $attributes = $request->all();
     $contract = $this->contract->update($contract_id, $attributes);
     $contract = $this->contract->getById($contract_id);

     return response()->json(compact('contract'), 200);
   }

   public function deletecontract($contract_id)
   {
     $contract = $this->contract->destroy($contract_id);
     return response()->json(compact('contract'), 200);
   }
}
