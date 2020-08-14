<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Contact;

class ApiController extends Controller
{
    use ResponseTrait,ModuleTrait;
    protected $module_name;
    protected $model;

    public function index($module_name)
    {
        try  {

        $this->setModuleName($module_name);
        $check = $this->initModel();
        if($check === false)
        {
        return $this->youCantAccess();

        }
        $data =  $this->model->paginate(10);
        return $this->successWithData($data);

    }
        catch (\Exception $ex) {
            return $this->errorResponse($ex->getMessage());
        }
    }

    public function getById($module_name,$id)
    {
        try  {

        $this->setModuleName($module_name);
        $check = $this->initModel();
         if($check === false)
         {
            return $this->youCantAccess();

         }
        $data =  $this->model->find($id);
        if($data)
        {
        return $this->successWithData($data);

        }
        return response()->json();

    }
        catch (\Exception $ex) {
            return $this->errorResponse($ex->getMessage());
        }

    }

    public function contacts(Request $request)
    {
       $v  = Validator::make($request->all(),
        [
         'name' => 'required|min:2|max:50',
         'email' => 'required|min:2|max:50|email',
         'mobile' => 'required|min:5|max:20',
         'message' => 'required|min:2|max:500',
        ]);
        if($v->fails()) {
            return $this->res($v->errors(),false,'we get an error');
        }
        Contact::create($request->all());
        return $this->res([],false,'ajout avec succee ');

    }
}
