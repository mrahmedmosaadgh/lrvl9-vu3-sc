<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\permission_role;
use App\Models\Role;
use App\Models\scschoolclass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    //

    public function __invoke(Request $request)
    {
        // dd(auth("sanctum")->user());
        if(auth("sanctum")->check()){
            
            return response()->json(auth("sanctum")->user());
        }
    }

    public function contest(Request $request)
    {
        try {
            $user1= User::where('id',1)->get('name');
            return response()->json(['message' => 'server connected, msql connected' ]);
        } catch (\Throwable $th) {
                       return response()->json(['message' => 'server connected, msql error' ]);

        }
        // return response()->json(['message' => 'server connected' ]);
    }
//     public function myclassesfun(Request $request){
// // --------get my classes------------------------------------
//     //    $myclasses= User::find(Auth::user()->id);
//     //    return $myclasses->thisismyclasses()->get();
// // --------get my classes------------------------------------
// // --------get my teachers------------------------------------
//        $teacher= scschoolclass::where('id',12)->first();//ok
//     //    $teacher= scschoolclass::find(12);//->first()
//        return $teacher->myteachers()->get();
// // --------get my teachers------------------------------------

//     //    $teacher= User::find(8);
//     //    $teacher= User::all()->thisismyclasses();
//     //    $teacher= User::all()->where("id",Auth::user()->id  );
//     //    $teacher= User::where("id",Auth::user()->id  )->thisismyclasses();
// // return $teacher;
//         // $user=user::where("id",Auth::user()->id  )->get('lang')->first();

//         // return response()->json(['message' => $user->lang ]);

//     }







    public function userdata(){
        try {
// $userdata=auth()->user();
        $userdata=[
            'user'=>auth()->user(),
            'user_roles'=>auth()->user()->roles,
            'user_permissions'=>auth()->user()->permissions,
        ];
        return response()->json(['message' => $userdata ]);

        } catch (\Throwable $th) {
            return response()->json(['message' => $th ]);

        }
    }

    public function lang(Request $request){
        $datain = [
            'lang'=>$request->lang,

        ];
        user::where("id",Auth::user()->id  )->update($datain);
        $user=user::where("id",Auth::user()->id  )->get('lang')->first();
        
        return response()->json(['message' => $user->lang ]);

    }

    
    public function usersload(Request $request)
    {//usertype=$request->usertype
        // return response()->json(['message' => 'usersload' ]);
        $users=User::all()->where('usertype',$request->usertype)->where('school_id',Auth::user()->school_id);
        return response()->json(['message' => $users ]);
        // return response()->json(['message' => Auth::user()->school_id ]);
    }
    public function usertypes()
    {
        $user_names = User::distinct()->get(['usertype']);
        //usertype=$request->usertype
        // return response()->json(['message' => 'usersload' ]);
        // $users=User::all()->where('usertype',$request->usertype)->where('school_id',Auth::user()->school_id);
        return response()->json(['message' => $user_names ]);
        // return response()->json(['message' => Auth::user()->school_id ]);
    }

    public function rolesall()
    {
        return response()->json(['message' => Role::all() ]);
    }//rolesall

    public function rolenew(Request $request)
    {
        if (!Auth::check()) {return response()->json(['message' => 'error Auth' ]); }
        try {
            Role::create($request->all());
        } catch (\Throwable $th) {
        }
        return response()->json(['message' => Role::all() ]);
    }//rolenew

    public function roleupdate(Request $request)
    {
        if (!Auth::check()) {return response()->json(['message' => 'error Auth' ]); }
        try {
        foreach ($request->all() as $key => $value) {
                    $datain = [
                        'name'=>$value['name'],
                        'display_name'=>$value['display_name'],
                        'description'=>$value['description'],
                    ];
                Role::where("id", $value['id'])->update($datain);}

                return response()->json(['message' => Role::all() ]);

        } catch (\Throwable $th) {
            return response()->json(['message' => $th ]);

        }


    }//roleupdate

    
//delete--------------------------------------------------
public function roledel(Request $request)
    {
    try {
        Role::find($request->id)->delete();
        return response()->json(['message' => 'success  deleted:'.$request->id]);
         }
    catch (\Throwable $th) 
        {
        return response()->json(['message' => ' error deleted:'.$th]);      
        }
}//roledel---------------------------------------------------------------------------

// =========================================================



public function permissionsall()
{
    return response()->json(['message' => Permission::all() ]);
}//permissionsall

public function permissionnew(Request $request)
{
    if (!Auth::check()) {return response()->json(['message' => 'error Auth' ]); }
    try {
        Permission::create($request->all());
    } catch (\Throwable $th) {
    }
    return response()->json(['message' => Permission::all() ]);
}//permissionnew

public function permissionupdate(Request $request)
{
    if (!Auth::check()) {return response()->json(['message' => 'error Auth' ]); }
    try {
    foreach ($request->all() as $key => $value) {
                $datain = [
                    'name'=>$value['name'],
                    'display_name'=>$value['display_name'],
                    'description'=>$value['description'],
                ];
            Permission::where("id", $value['id'])->update($datain);}

            return response()->json(['message' => Permission::all() ]);

    } catch (\Throwable $th) {
        return response()->json(['message' => $th ]);

    }


}//permissionupdate


//delete--------------------------------------------------
public function permissiondel(Request $request)
{
try {
    Permission::find($request->id)->delete();
    return response()->json(['message' => 'success  deleted:'.$request->id]);
     }
catch (\Throwable $th) 
    {
    return response()->json(['message' => ' error deleted:'.$th]);      
    }
}//permissiondel---------------------------------------------------------------------------

// =============================================ORDER BY `permission_role`.`role_id` ASC

public function permission_role()
{
    $permission_role = DB::table('permission_role')->orderBy('role_id')->get();
    $data=[
             'permission'     => Permission::all(),
             'role'           =>  Role::all(),
             'permission_role'=>  $permission_role,
    ];


     // it will get the entire table
    return response()->json(['message' => $data ]);
    // return response()->json(['message' => permission_role::all() ]);
}//permissionsall




// -------------------------------------------------------------------------
public function permission_role_update(Request $request)
{
        // DB::table('permission_role')->whereIn('id', $ids_to_delete)->delete();
    try {
        DB::table('permission_role')->where('role_id', $request->selectedrole)
        ->delete();

        foreach ($request->selectedpermissions as $key => $value) {
        DB::table('permission_role')->insert(['role_id' => $request->selectedrole, 'permission_id' => $value]);
                    }

    return response()->json(['message' =>'success']);
    } catch (\Throwable $th) {
        return response()->json(['message' =>$th]);
    }

}//permission_role_update


}
