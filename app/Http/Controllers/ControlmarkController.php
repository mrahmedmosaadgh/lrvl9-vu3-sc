<?php

namespace App\Http\Controllers;

use App\Models\Forqan_controlmark;


use App\Models\Forqan_controlmarks_setup;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
class ControlmarkController extends Controller
{


    public function storeImage(Request $request){
        $file    = $request->file('image');
        $filename= auth()->user()->id.".jpg";
        $fullpath=public_path('marks/logo/'.$filename);
    
        if($file){
    
                try {
                        $request->validate(["image" => [ 'max:3024'] ]);
                                    if(File::exists($fullpath)){File::delete($fullpath);}
                                    $file-> move(public_path('marks/logo'), $filename);
    
                        return response()->json(['message' =>'image  uploaded success '], 200);
    
                    } catch (\Throwable $th) {
                        return response()->json(['message' => 'image  more than 3 mb','error' => $th]);
                    }
    
    
            }
        }
    













    public function store(Request $request){
        $path = public_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('image');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return ['name'=>$name];
            
    }
    public function getImages(Request $request){

        // $images = [
        //     [
        //         'id'=>'30',
        //         'post_id'=>'1',
        //         'name'=>'1.png',
        //     ],
        //     [
        //         'id'=>'31',
        //         'post_id'=>'12',
        //         'name'=>'02.jpg',
        //     ],
        //     [
        //         'id'=>'32',
        //         'post_id'=>'12',
        //         'name'=>'03.jpg',
        //     ],
        //     [
        //         'id'=>'33',
        //         'post_id'=>'13',
        //         'name'=>'04.jpg',
        //     ],
        //     [
        //         'id'=>'34',
        //         'post_id'=>'13',
        //         'name'=>'05.jpg',
        //     ],
        //     [
        //         'id'=>'35',
        //         'post_id'=>'13',
        //         'name'=>'06.png',
        //     ],
        // ];
        $images = [
            [
                'id'=>'30',
                'post_id'=>'1',
                'name'=>'1.png',
            ],

        ];
        return ['media'=>$images];

        // $images = $post->images;
        // return ['media'=> public_path('/post_images').'/1.png'];
        // return ['media'=> [public_path('post_images/1.png')]];
        // return ['media'=> ['1.png']];
        // return ['media'=>$request->all()];
    }
    // public function getImages(Post $post){
    //     $images = $post->images;
    //     return ['media'=>$images];
    // }
    public function uploadimg(Request $request){
            
        // $request->validate([
        //    'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
        // ]);

        // $fileUpload = new FileUpload;

        if($request->file()) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');

            // $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
            // $fileUpload->path = '/storage/' . $file_path;
            // $fileUpload->save();

            return response()->json(['success'=>'File uploaded successfully.']);
        }
   }

    // getmarks
//     public function getmarks(Request $request)
//     {
// $marks=$request->all();
//         return response()->json([
//         'message' => 'getmarks success -----',
//         'marks' => $marks ,
//     ]);
//     }

    public function getmarks_student(Request $request)
    {

try {
    //code...

        $Forqan_controlmarks_setup_id=Forqan_controlmarks_setup::all()
        ->where('school_id',1)
        ->where('active',1)->first()->id;

        $marks=Forqan_controlmark::where('school_id',1)
        ->where('controlmarkssetup_id',$Forqan_controlmarks_setup_id)
        // ->where('classname',$request['classname'])
        // ->where('subject',$request['subject'])
        // ->with('mystudent');
        ->where('student_id',Auth::user()->id)

        ->with('mystudent','myteacher')->get();
        return response()->json([
        'message' => 'getmarks success -----',
        'marks' => $marks ,
        'Auth'    => Auth::check(),
    ]);



} catch (\Throwable $th) {
    //throw $th;
    return response()->json([
        'message' => 'getmarks success -----',
        'marks'   => $marks ,
        'Auth'    => Auth::check(),
    ]);
}


    }











    public function getmarks(Request $request)
    {


        $Forqan_controlmarks_setup_id=Forqan_controlmarks_setup::all()
        ->where('school_id',1)
        ->where('active',1)->first()->id;
    
        $marks=Forqan_controlmark::where('school_id',1)
        ->where('controlmarkssetup_id',$Forqan_controlmarks_setup_id)
        // ->where('classname',$request['classname'])
        // ->where('subject',$request['subject'])
        // ->with('mystudent');
        ->with('mystudent','myteacher')->get();
        // ->with('mystudent')->get()->first();






        return response()->json([
        'message' => 'getmarks success -----',
        'marks' => $marks ,
        'Forqan_controlmarks_setup_id' => $Forqan_controlmarks_setup_id ,
        'teacher_id' =>  Auth::user()->id,
        'nameen' =>  Auth::user()->name,
     
    ]);
    }














    // saveallmarks--------------------------------------

        public function saveallmarks(Request $request)
{
    $Forqan_controlmarks_setup_id=Forqan_controlmarks_setup::all()
    ->where('school_id',1)
    ->where('active',1)->first()->id;

    $marks=Forqan_controlmark::where('school_id',1)
    ->where('controlmarkssetup_id',$Forqan_controlmarks_setup_id)
    ->where('classname',$request['classname'])
    ->where('subject',$request['subject'])
    // ->with('mystudent');
    ->with('mystudent')->get();
$marks=$request->mymarks;
// $marks=$request->mymarks[0]['sub1'];
    //     return response()->json([
    //     'message' => 'saveallmarks success -----',
    // //     'mystudent' => $mystudent ,
    //     'marks' => $marks ,
    // //     'count' => count($marks) ,
    // // 'id' => $value['id'] ,
    // ]);

try {
    //code...

    foreach ($marks as $key => $value) {

        Forqan_controlmark::findOrFail($value['id'])->update([
            "teacher_id"  =>Auth::user()->id,
            "sub1"  =>$value["sub1" ],
            "sub2"  =>$value["sub2" ],
            "sub3"  =>$value["sub3" ],
            "sub4"  =>$value["sub4" ],
            "sub5"  =>$value["sub5" ],
            "sub6"  =>$value["sub6" ],
            "sub7"  =>$value["sub7" ],
            "sub8"  =>$value["sub8" ],
            "sub9"  =>$value["sub9" ],
            "sub10" =>$value["sub10"],
        ]);

    }




    $Forqan_controlmarks_setup_id=Forqan_controlmarks_setup::all()
    ->where('school_id',1)
    ->where('active',1)->first()->id;

    $marks=Forqan_controlmark::where('school_id',1)
    ->where('controlmarkssetup_id',$Forqan_controlmarks_setup_id)
    ->where('classname',$request['classname'])
    ->where('subject',$request['subject'])
    // ->with('mystudent');
    ->with('mystudent')->get();
    
    
    
    return response()->json([
        'message' => 'getstudents success -----',
        'marks' => $marks ,
    
    ]);
    
 



} catch (\Throwable $th) {
    //throw $th;

    $Forqan_controlmarks_setup_id=Forqan_controlmarks_setup::all()
    ->where('school_id',1)
    ->where('active',1)->first()->id;

    $marks=Forqan_controlmark::where('school_id',1)
    ->where('controlmarkssetup_id',$Forqan_controlmarks_setup_id)
    ->where('classname',$request['classname'])
    ->where('subject',$request['subject'])
    // ->with('mystudent');
    ->with('mystudent')->get();


    return response()->json([
        'message' => 'saveallmarks failed -----',
    //     'mystudent' => $mystudent ,
        'marks' => $marks ,
    //     'count' => count($marks) ,
    // 'id' => $value['id'] ,
    ]);










}









}



    
        public function getstudents(Request $request)
{
    // all student in the class
$mystudent=User::where('classname',$request['classname'])
->where('school_id',1)
->get();
//  id for setup marks
$Forqan_controlmarks_setup_id=Forqan_controlmarks_setup::all()
->where('school_id',1)
->where('active',1)->first()->id;
// for every student create his empty marks------
foreach ($mystudent as $key => $value) {
    $marks=Forqan_controlmark::where('school_id',1)
    ->where('controlmarkssetup_id',$Forqan_controlmarks_setup_id)
    ->where('classname',$request['classname'])
    ->where('subject',$request['subject'])
    ->where('student_id',$value['id'])->get();

    // if not found create one
if( count($marks)<1){
    $userData = 
    array(
        'controlmarkssetup_id' => 1,
        'school_id' => 1,//teacher_id
        'teacher_id' =>  Auth::user()->id,//Auth::id()
        'student_id' => $value->id,
        'classname'  => $request['classname'] ,
        'subject'  => $request['subject'] ,
        );
    Forqan_controlmark::create($userData);

}

}//end foreach

// return students with marks
$marks=Forqan_controlmark::where('school_id',1)
->where('controlmarkssetup_id',$Forqan_controlmarks_setup_id)
->where('classname',$request['classname'])
->where('subject',$request['subject'])
// ->with('mystudent');
->with('mystudent')->get();

return response()->json([
    'message' => 'getstudents success -----',
    'mystudent' => $mystudent ,
    'marks' => $marks ,
]);

}//end function getstudents




    
    // "/api/forqan/teacher/class/getstudents"
        public function getstudentsold(Request $request)
{
//     return response()->json([
//         'message' => 'getstudents success -----',
//         // 'data' => $marks ,
//         'data2' => $request['classname'] ,

// ]);
// $mystudent=User::where('classname',$request->classname)
// ->where('school_id',1)
// ->where('controlmarkssetup_id ','student')
// ->get();

$Forqan_controlmarks_setup_id=Forqan_controlmarks_setup::all()
->where('school_id',1)
->where('active',1)->first()->id;

// return response()->json([
//     'message' => 'getstudents success -----',
//     'data' => $Forqan_controlmarks_setup_id ,
//     'data2' => $request['classname'] ,

// ]);
$sub_num=Subject::where('name',$request['subject'])->first()->sub;

$marks=Forqan_controlmark::where('school_id',1)
->where('controlmarkssetup_id',$Forqan_controlmarks_setup_id)
->where('classname',$request['classname'])
// ->with('mystudent');
->with('mystudent')->get();
$mymarks=array();
// $stack = array("orange", "banana");
// array_push($stack, "apple", "raspberry");

// $sub_num='sub3';
// $subarray=
// [
//     'P'=>12,'HW'=>11,'Q1'=>null,'Q2'=>null,'Qtotal'=>null,'Projects'=>null,'exam'=>null,'total'=>55,
//     'grade'=>null,'notes'=>'ddddd'];
    $subarray=$request['arraytest'];
$subarraytotxt=json_encode($subarray);

foreach ($marks as $key => $value) {
    array_push($mymarks, 
[
    'id'=>$value['id'],
    'student_id'=>$value['student_id'],
    'classname'=>$value['classname'],
    'mystudent'=>$value['mystudent'],
    'name'=>$value['mystudent']['nameen'],
    'sub1'=>$value[$sub_num],
    'mark'=>json_decode($value[$sub_num]),
    'subarray'=>$subarray,
    'subarraytotxt'=>$subarraytotxt,
    'subarraytotxt->toarray'=>json_decode($subarraytotxt),
    // 'sub'=>json_decode($value[$sub_num]),
    // 'sub3'=>unserialize($value[$sub_num]),
    
]
);


// // 'student_id'=>$value['student_id']
// Forqan_controlmark::where('school_id',1)
// ->where('controlmarkssetup_id',$Forqan_controlmarks_setup_id)
// ->where('student_id',$value['student_id'])
// ->update(['sub1'=>json_encode($subarray)]);


    



}
    return response()->json([
        'message' => 'getstudents success -----',
        'data' => $marks ,
        'classname' => $request['classname'] ,

        'sub' => $sub_num ,
'mymarks' => $mymarks ,
'in' => json_encode($subarray) ,
]);

}

        public function update_class_sub_all(Request $request)
{

//     return response()->json([
//         'message' => 'subjects success -----',
//         'data' => $request->all() ,
// ]);
// -----teachers update sub class --------------------------------------
// $teachers=User::where('school_id',1)
// ->where('usertype','teacher')
// ->where('project_name','forqan')->update([
//     'subjects' =>'[]',
//     'classname'  => '[]',
// ]);

try {
    //code...

$teachers=User::where('school_id',1)
->where('usertype','teacher')
->where('project_name','forqan')->get();
// return response()->json([
//     'message' => 'subjects success -----',
//     'data' => $request->data ,
//     // 'data2' => $subjects ,
// ]);
$counter=-1;
foreach ($request->data as $key => $value) {
    $counter++;

// here----------------------------------------------------------
// $userData =array(
//                 'subjects' =>json_encode($value['subjects']),
//                 'classname'  => json_encode($value['classname']),

//                 // 'subjects' =>$value->subjects,
//                 // 'classname'  => $value->classname,
//                 // 'subjects' =>json_encode($value->subjects) ,
//                 // 'classname'  => json_encode($value->classname),
//                 );
            //     [
            //         'subjects' =>json_encode($value['subjects']),
            // 'classname'  => json_encode($value['classname']),
            //     ]
            User::findOrFail($value['id'])->update([
                'subjects' =>json_encode($value['subjects']),
                'classname'  => json_encode($value['classname']),
            ]);
            //     User::findOrFail($value['id'])->update(
            //     [
            // 'subjects' =>json_encode($value['subjects']),
            // 'classname'  => json_encode($value['classname']),
            //     ]
            //     );
                // return response()->json([
                //     'message' => 'subjects classes success  updated -----',
                //     'data' =>$value['id'] ,
                //     'data2' =>$userData  ,
                
                // ]);

}




return response()->json([
    'message' => 'subjects classes success  updated -----',
    'data' => $teachers ,

]);

} catch (\Throwable $th) {
    return response()->json([
        'message' => 'subjects classes error  updated -----',
        'data' => $th ,
    
    ]);
}

// ---------------------------
}

        public function allsub(Request $request)
{
    $subjects=DB::table('subjects')->get();
    // ->where('school_id',1)
    // ->where('usertype','teacher')
    // ->where('project_name','forqan')
    return response()->json([
        'message' => 'subjects success -----',
        'data' => $subjects ,
]);
}
    // allclasses
    //   admin
        public function allclasses(Request $request)
{
    $classes=DB::table('forqan_classes')->get();
    // ->where('school_id',1)
    // ->where('usertype','teacher')
    // ->where('project_name','forqan')
    return response()->json([
        'message' => 'allclasses success -----',
        'data' => $classes ,
]);
}
    

    // teacher_sub_class admin
        public function teacher_sub_class(Request $request)
{
    $teachers=User::where('school_id',1)
    ->where('usertype','teacher')
    ->where('project_name','forqan')->get();
    return response()->json([
        'message' => 'teacher_sub_class success -----',
        'data' => $teachers ,
]);

}



    
    // showmarks admin
        public function showmarks(Request $request)
{
    $marks=Forqan_controlmark::all()
    ->where('controlmarkssetup_id',1)
    ->where('school_id',1)
    ;
    return response()->json([
        'message' => 'showmarks success -----',

        // 'data' => json_encode($request['marks'][0]) ,
        'data' => $marks,
// 'data' => $request->all(),

]);

}
    public function savemarks(Request $request)
{
//     return response()->json([
//         'message' => 'savemarks success -----',

//         'data' => json_encode($request['marks'][0]) ,
//         // 'data' => $request->all(),

// ]);
$matchdata=
array(
    'controlmarkssetup_id' => 1,
    'school_id' => 1,
    'student_id' => 207,

    );


$userData = 
array(
    'controlmarkssetup_id' => 1,
    'school_id' => 1,
    'student_id' => 207,
    'sub3'  =>json_encode($request['marks'][0]) ,
    );
    Forqan_controlmark::where('controlmarkssetup_id',1)
->where('school_id',1)
->where('student_id',207)->update($userData);

$marks=Forqan_controlmark::all()
->where('controlmarkssetup_id',1)
->where('school_id',1)
->where('student_id',207);

    return response()->json([
        'message' => 'savemarks success -----',

        'data' => $marks,


]);
}
public function savemarks_insert_students(Request $request)
{


// insert all students once

// $val=[

//         'id_user' => '< ID_USER >',
//     'title' => '< TITLE >',
//     'body' => '< BODY >',

// ];project_name


$Students=user::all()->where('school_id',1)
->where('project_name','forqan')
->where('usertype','student');

foreach ($Students as $key => $value) {
   
    $marks=Forqan_controlmark::all()
    ->where('controlmarkssetup_id',1)
    ->where('school_id',1)
    ->where('student_id',$value->id);
//    return response()->json([
//         'message' => 'savemarks success -----',
//         'data' => $marks,
    
    
//     ]);
   
    if(count($marks)<1){
    // return response()->json([
    //     'message' => 'savemarks success -----',
    //     'data' => $marks,
    
    
    // ]);

    // $userData = array('username' => 'Me', 'email' => 'me@yahoo.com');
    // User::create($userData);

    $userData = 
    array(
        'controlmarkssetup_id' => 1,
        'school_id' => 1,
        'teacher_id' =>  Auth::user()->id,
        'student_id' => $value->id,
        'classname'  => $value->classname,
        );
        Forqan_controlmark::create($userData);







        // $marksnew = new Forqan_controlmark();
        //         $marksnew->controlmarkssetup_id = 1;
        //         $marksnew->school_id            = 1;
        //         $marksnew->student_id           = $value->id;
        //         $marksnew->classname             = $value->classname;
               
               
                // $marks->controlmarkssetup_id = $request->student_name;
                // $marks->school_id            = $request->student_email;
                // $marks->grade                = $request['classname'];;
                // $marks->stage                = $file_name;
                // $marks->teacher_id           = $request->student_gender;
                // $marks->subject_id           = $file_name;
        
                // $marksnew->save();



    }
}
$marksall=Forqan_controlmark::all()
    ->where('controlmarkssetup_id',1)
    ->where('school_id',1);

return response()->json([
    'message' => 'savemarks success -----',
    'data' => $marksall,


]);
// Forum::create($val);
$marks = new Forqan_controlmark();
// $request['classname'];
// $request['sub'];
// $request['marks'];
        $marks->controlmarkssetup_id = 1;
        $marks->school_id            = 1;
        $marks->student_id           = '$file_name';
        $marks->classname             = '$file_name';
        // 'teacher_id' =>  Auth::user()->id,

        // $marks->controlmarkssetup_id = $request->student_name;
        // $marks->school_id            = $request->student_email;
        // $marks->grade                = $request['classname'];;
        // $marks->stage                = $file_name;
        // $marks->teacher_id           = $request->student_gender;
        // $marks->subject_id           = $file_name;

        $marks->save();







    // INSERT INTO `forqan_controlmark` (`id`, `controlmarkssetup_id`, `school_id`, `teacher_id`, `classname`, `subject_id`, `student_id`, `grade`, `stage`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`, `sub8`, `sub9`, `sub10`, `sub11`, `sub12`, `sub_count`, `notes`, `created_at`, `updated_at`) VALUES (NULL, '1', '1', '8', '1', '1', '158', '1', NULL, '111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);






    // "classname": "2A", "sub": "English", "marks": [ { "id": 207, "mark": { "P": 12, "HW": 12, "A": null, "Q1": 12, "Q2": 12, "Qtotal": 12, "Projects": 12, "exam": 22, "total": 55, "grade": 1 } },
$classname=$request['classname'];
$sub      =$request['sub'];
$marks    =$request['marks'];




    return response()->json([
        'message' => 'savemarks success -----',
        'data1' => $classname,
        'data2' => $sub      ,
        'data3' => $marks    ,
        'data' => $request->all(),


]);

}
// insert teachers from xls`
public function insert_teachers_to_db(Request $request)
{
    return response()->json([
        'message' => 'insert_teachers_to_db success -----',
        'data' => $request,
        // 'data' =>$request->data['round'],
        // 'data' => $lastRound,
]);
    $data = $request->validate([
        'name' => 'required|min:3|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|max:255|confirmed'
    ]);
    // name	email	password	nameen	classname
// 

    $user = User::create([
        'name' => $data['name'],
        'nameen' => $data['nameen'],
        'classname' => $data['classname'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
    if ($user) {
        event(new Registered($user));
        $token = $user->createToken('access_token')->plainTextToken;
        return response()->json(["token" => $token , "type" => "Bearer"]);
    }
}
// --------------------------------------------




    //
//     public function datacontrolmarks(Request $request)
//     {
// try {
//     //code...
//     // scschoolclassteachersubject
//         $teacher= scschoolclassteachersubject::where("teacher_id",Auth::user()->id  )
//         ->with('myclasses')
// ->with('mysubjects')
// ->with('myteacher')
// ->with('mystudent')
// ->with('myschedules')
// ->with('mycontrolmarks')

//         // $teacher= User::where("id",Auth::user()->id  )
//         // ->with('tcs')
//         ->get();
//         return response()->json([
//             "data" => $teacher,
//             "user" => Auth::user()->id,
//             "msg" => "datacontrolmarks",
//         ], 200);


//     } catch (\Exception $e) {
//     // } catch (\Throwable $th) {
//         return response()->json([
//             "data" => $e,
//             // "data" => $th,
//             "msg" => "datacontrolmarks  error",
//         ], 200);
//     }
        
//     }


}
