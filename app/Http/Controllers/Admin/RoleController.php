<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleInsertFormRequest;
use Spatie\Permission\Models\Role;
class RoleController extends Controller
{

    /* the following method is to show all the roles of the system */

    public function show()
    {
        $roles=Role::all();
        return view('Admin.roles.view',compact('roles'));
    }
    /*  the following method is to show the form for add a role*/

    public function create()
    {
        return view('Admin.roles.add');
    }

    /* the following method is insert the role into the database */

    public function store(RoleInsertFormRequest $request)
    {
        $name= $request->get('name');
        Role::create(['name'=>$name]);
        return redirect("admin/role/create")->with('status','A New Role Is Successfully Inserted');

    }
}
