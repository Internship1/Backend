<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Repositories\CompanyRepository;
use JWTAuth;
use Request as token;
use Auth;

class CompanyController extends Controller
{
  private $company;

   public function __construct(CompanyRepository $company)
   {
     $this->company = $company;
   }

   public function getAllcompany()
   {
      $companies = $this->company->getAll();
      return response()->json(compact('companies'), 200);
   }


   public function getcompanyDetail($employer_id)
   {
     $company = $this->company->getById($employer_id);

     return response()->json(compact('company'), 200);
   }

   public function storeCompany(Request $request)
   {
     $attributes = $request->all();
     $company =$this->company->create($attributes);
     return response()->json(compact('company'), 200);
   }

   public function updateCompany($employer_id,Request $request)
   {// cek employer_id dengan id token..sama?
//     $attributes = $request->all();
       $attributes = $request->only('company_name','company_contact','company_address','company_email','company_website','company_description');
     $company = $this->company->update($employer_id, $attributes);
     $company = $this->company->getById($employer_id);
       
       //Hanya dapat mengedit profilenya sendiri
//       $user = Auth::user()->id;
       $user = token::instance()->id;
       if($user==$company->employer_id){
          return response()->json(compact('company'), 200);
       }else{
           return response()->json("Access Denied!", 500);
       }
       
//       return response()->json(compact('company'), 200);

   }

   public function deletecompany($employer_id)
   {
     $company = $this->company->destroy($employer_id);
     return response()->json(compact('company'), 200);
   }
}
