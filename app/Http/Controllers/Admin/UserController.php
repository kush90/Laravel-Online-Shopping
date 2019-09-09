<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    /* the following method is show all the user of the system */

    public  function show_user()
    {
        $users=User::all();

        return view('Admin.users.view',compact('users'));
    }

    /* the following method is to show the form of the particular user to edit role  */

    public  function editform($id)
    {
        $user=User::whereId($id)->first();
        $roles=Role::all();
        $selected=$user->roles()->pluck("name")->toArray();

        return view('Admin.users.edit',compact('user','roles','selected'));
    }

    /* the following method is update role of the particular user */

    public  function update(Request $request,$id)
    {
        $user=User::whereId($id)->firstOrFail();
        $user->syncRoles($request->get("role"));
        return redirect(action('Admin\UserController@editform',$id))->with("status","You Have Added Role ");
    }

}
