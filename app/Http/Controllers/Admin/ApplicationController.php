<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApplicationForm;
use Illuminate\Pagination\Paginator;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.applications.index');
    }

    /**
     * List employees
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $start = $request->input('start');
        $length = $request->input('length');
        $order = $request->input('order');
        $search = $request->input('search');
        $searchValue = $search['value'] ?: false;
        $column = 'created_at';
        $dir = 'DESC';
        if (is_array($order) && sizeof($order) > 0) {
            if (isset($order[0]['column']) && isset($order[0]['dir'])) {
                switch ($order[0]['column']) {
                    case "0":
                        $column = "created_at";
                        $dir = $order[0]['dir'];
                        break;
                        break;
                    case "1":
                        $column = "first_name";
                        $dir = $order[0]['dir'];
                        break;
                    case "2":
                        $column = "last_name";
                        $dir = $order[0]['dir'];
                        break;
                    case "3":
                        $column = "email";
                        $dir = $order[0]['dir'];
                        break;
                    case "4":
                        $column = "mobile_no";
                        $dir = $order[0]['dir'];
                        break;
                    default:
                        $column = "created_at";
                        $dir = "DESC";
                }
            }
        }

        $currentPage = ($request->start == 0) ? 1 : (($request->start / $request->length) + 1);

        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });

        $startNo = ($request->start == 0) ? 1 : (($request->length) * ($currentPage - 1)) + 1;

        $rows = ApplicationForm::select('*')
            ->when($searchValue, function ($query, $searchValue) {
                return $query->where('first_name', 'LIKE', '%' . $searchValue . '%')
                    ->OrWhere('last_name', 'LIKE', '%' . $searchValue . '%')
                ->OrWhere('email', 'LIKE', '%' . $searchValue . '%')
                ->OrWhere('mobile_no', 'LIKE', '%' . $searchValue . '%');
            });


        $orderDir = $request->order[0]['dir'];
        $orderColumnId = $request->order[0]['column'];
        $orderColumn = str_replace('"', '', $request->columns[$orderColumnId]['name']);


        $rows = $rows->orderBy($orderColumn, $orderDir)->paginate($request->length)->toArray();
        $rows['recordsFiltered'] = $rows['recordsTotal'] = $rows['total'];


        foreach ($rows['data'] as $key => $result) {

            $params = [
                'application' => $result['id']
            ];

            $rows['data'][$key]['sr_no'] = $key + 1;

            $date = date_create($result['created_at']);
            $formatDate =  date_format($date, "Y/m/d H:i:s");


            $rows['data'][$key]['created_at'] = $formatDate;
            $rows['data'][$key]['action'] = '';
        }
        return response()->json($rows);
    }
}
