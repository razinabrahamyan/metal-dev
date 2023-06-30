<?php


namespace App\Library\Services;


use App\Library\Services\Contracts\CompanyContract;
use Illuminate\Support\Facades\Validator;

class CompanyService implements CompanyContract
{

    public function index(){

    }
    public function store($request){
        $validator = $this->companyValidate($request->all())->validate();
    }
    public function show($id){

    }
    public function edit($id){

    }
    public function update($request, $id){

    }
    public function destroy($id){

    }

    public function companyValidate($data){
        return Validator::make($data,[
            "company"         => "required|string|max:255",
            "ogrn"            => "numeric|max:25",
            "inn"             => "numeric|max:25",
            "kpp"             => "numeric|max:25",
            "legal_address"   => "required|string|max:255",
            "post_address"    => "required|string|max:255",
            "responsible"     => "required|string",
            "phone"           => "required|string",
            "taxation"        => "required|string",
        ]);
    }
}
