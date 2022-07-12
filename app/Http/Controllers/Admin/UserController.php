<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
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
                        $column = "name";
                        $dir = $order[0]['dir'];
                        break;
                    case "2":
                        $column = "email";
                        $dir = $order[0]['dir'];
                        break;
                    case "3":
                        $column = "is_active";
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

        $rows = User::select('*')
            ->when($searchValue, function ($query, $searchValue) {
                return $query->where('name', 'LIKE', '%' . $searchValue . '%')
                    ->OrWhere('email', 'LIKE', '%' . $searchValue . '%');
            });


        if ($request->status != '' || $request->status != null) {
            $rows = $rows->where('is_active',  $request->status);
        }

        $orderDir = $request->order[0]['dir'];
        $orderColumnId = $request->order[0]['column'];
        $orderColumn = str_replace('"', '', $request->columns[$orderColumnId]['name']);


        $rows = $rows->orderBy($orderColumn, $orderDir)->paginate($request->length)->toArray();
        $rows['recordsFiltered'] = $rows['recordsTotal'] = $rows['total'];


        foreach ($rows['data'] as $key => $result) {

            $params = [
                'user' => $result['id']
            ];

            $rows['data'][$key]['sr_no'] = $key+1;

            $statusRoute = route('admin.users.status', $params);

            $editRoute = route('admin.users.edit', $params);
            $deleteRoute = route('admin.users.destroy', $params);
            $resultRoute = route('admin.users.results', $params);

            $status = ($result['is_active'] == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';

            $rows['data'][$key]['action'] = '';

            $rows['data'][$key]['action'] .= '<a href="' . $editRoute . '" class="btn btn-success" title="Edit user information"><i class="fa fa-pencil-square-o"></i></a>&nbsp&nbsp';

            $rows['data'][$key]['action'] .= '<a href="javascript:void(0);" data-url="' . $deleteRoute . '" class="btn btn-danger btnDelete" data-title="user
            " title="Delete"><i class="fa fa-trash"></i></a>';

            $rows['data'][$key]['is_active'] = '<a href="javascript:void(0);" data-url="' . $statusRoute . '" class="btnChangeStatus">' . $status . '</a>';
        }
        return response()->json($rows);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', [
            'user' => '',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check Validation
        $this->validate($request,  [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|max:255|unique:users',
        ]);

        $user = new User();
        $user->fill($request->all());
        $user->is_active = $request->status;

        if ($user->save()) {
            return redirect(route('admin.users.index'))->with('success', trans('messages.users.create.success'));
        }

        return redirect(route('admin.users.index'))->with('error', trans('messages.users.create.error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $query = User::where('id', $id)->first();
        if($query != null){
            return view('admin.users.create', [
                'user' => $query,
            ]);
        }

        return redirect()->route('admin.users.index', ['error' => 'user has been not found']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Check Validation
        $this->validate($request,  [
            'name' => 'required|string|max:255|unique:users,name,' . $user->id,
            'email' => 'required|string|max:255|unique:users,email,' . $user->id,
        ]);

        // old data
        $oldPassword = $user->password;

        // dd($request->all());

        $user->fill($request->all());
        if($request->password == ''){
            $user->password = $oldPassword;
        }

        $user->is_active = $request->status;

        if ($user->save()) {
            return redirect(route('admin.users.index'))->with('success', trans('messages.users.update.success'));
        }
        return redirect(route('admin.users.index'))->with('error', trans('messages.users.update.error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return redirect(route('admin.users.index'))->with('success', trans('messages.users.delete.success'));
        }

        return redirect(route('admin.users.index'))->with('error', trans('messages.users.delete.error'));
    }

     /**
     * Change status of the employee.
     *
     * @param User $employee
     * @return Redirect
     */
    public function changeStatus(User $user)
    {
        $user->is_active = !$user->is_active;

        if ($user->save()) {
            $status = $user->is_active ? 'active' : 'inactive';
            return redirect(route('admin.users.index'))->with('success', trans('messages.users.status.success', ['status' => $status]));
        }
        return redirect(route('admin.users.index'))->with('error', trans('messages.users.delete.error'));
    }

    /**
     * Change status of the employee.
     *
     * @param User $employee
     * @return Redirect
     */
    public function userResults(User $user)
    {
        dd('comming soon');
    }
}
