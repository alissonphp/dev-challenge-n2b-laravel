<?php

namespace App\Http\Controllers;

use App\Http\Models\Employee;

/**
 * Class EmployeeInfosController
 * @package App\Http\Controllers
 */
class EmployeeInfosController extends Controller
{
    /**
     * @var Employee
     */
    protected $model;

    /**
     * EmployeeInfosController constructor.
     * @param Employee $model
     */
    public function __construct(Employee $model)
    {
        $this->model = $model;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index($id)
    {
        try {

            $infos = $this->model->find($id)->with('company')->first();
            $res = [
                'fullname' => $infos->name . ' ' . $infos->lastname,
                'company' => $infos->company->name
            ];

            return response($res, 200);

        } catch (\Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }

}