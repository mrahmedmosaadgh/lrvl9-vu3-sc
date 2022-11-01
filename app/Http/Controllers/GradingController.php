<?php

namespace App\Http\Controllers;

use App\Models\Grading;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class GradingController extends Controller
{
//  insertone
//  insertmulti
//  updateone
//  updateall
//  deleteone
//  deletemulti
//  getone
//  getmulti
//  getall
public function xls_to_db(Request $request)
{
    return response()->json(['message' => 'marks_xls_to_db from api','datahhh' =>$request->data]);
    // return response()->json(['message' => 'marks_xls_to_db from api','data' =>$request->id]);

     $school_id=1;
     $marks_setup_id=$request->id;
        //    $foundbefore= MarksMark::where('school_id',$school_id)
        //     ->where('marks_setup_id',$marks_setup_id)
        //     ->where('student_id',$request->all()[3]['student_id'])
        //     ->get();
            $array_keys=array_keys($request->data[0]);


    $matchThese1 = [

        'school_id'     =>$school_id                      ,
        'id'=>$marks_setup_id                 ,

        ];

                $MarksSetup_data=[
                            'school_id'            =>$school_id   ,
                            'name'                =>''   ,
                            'term'                =>$request->data[1]['classroom'],
                            'year'                =>date("Y")   ,
                            'search_field'        =>'student_id'   ,
                            'names_array'         =>array_values($request->data[0])   ,
                            'max_array'           =>array_values($request->data[1])   ,
                            'min_array'           =>array_values($request->data[2])   ,
                            'keys_array'          =>$array_keys,
                            'grade'               =>$request->data[1]['student_name'],
                            'lang'                =>$request->data[1]['type']   ,

                            'notes'               =>$school_id   ,
                ];

        // array_values($request->data[0]);
        //             return response()->json([
        //                 'name' => $MarksSetup_data,
        // 'name2' => $request->data[0],
                    
        //             ]);



       try {
        Grading::updateOrCreate($matchThese1,$MarksSetup_data);


       } catch (\Throwable $th) {
           return response()->json([
               'message' => 'error',
               'data' => $th,
           ]);
       }


     $data_Marks=[
        'school_id'     =>$school_id,
        'marks_setup_id'=>$marks_setup_id,
        'student_id'    =>'',
        'student_name'  =>'',
         'classroom'    =>'',
        'type'          =>'',
        'sub1'          =>'',
        'sub2'          =>'',
        'sub3'          =>'',
        'sub4'          =>'',
        'sub5'          =>'',
        'sub6'          =>'',
        'sub7'          =>'',
        'sub8'          =>'',
        'sub9'          =>'',
        'sub10'         =>'',
        'sub11'         =>'',
        'sub12'         =>'',
        'sub13'         =>'',
        'sub14'         =>'',
        'sub15'         =>'',
        'sub16'         =>'',
        'sub17'         =>'',
        'sub18'         =>'',
        'sub19'         =>'',
        'sub20'         =>'',
        'total'         =>'',
        'total2'        =>'',
        // 'active'        =>1,
        'msg'           =>'',
        // 'seencounter'   =>'',
        'notes'         =>'',
        'username'      =>'',
        'password'      =>'',
        'created_at'    =>date(now()),
     ];
    for ($i=3; $i <count($request->data) ; $i++) {

        // $MarksMark = new MarksMark;
        for ($t = 0; $t < count($array_keys); $t++) {
            $indexdata = $array_keys[$t];
            if (!isset($request->data[$i][$indexdata])) {
                // $MarksMark->$indexdata = '';

                $data_Marks[$indexdata] = '';
            } else {
                $data_Marks[$indexdata] = $request->data[$i][$indexdata];
                // $MarksMark->$indexdata = $request->data[$i][$indexdata];
            }
        }


            $matchThese = [

            'school_id'     =>$school_id                      ,
            'marks_setup_id'=>$marks_setup_id                 ,
            'student_id'    =>$request->data[$i]['student_id'],
            ];

        try {
            Grading::updateOrCreate($matchThese,$data_Marks);
                // $MarksMark->save();
                // MarksSetup::insert($data_MarksSetup);
                //    $MarksMark= MarksMark::insert($data_Marks);
            // MarksMark::create($data_Marks);

                } catch (\Throwable $th) {

                    // MarksMark::where('school_id',$school_id)->where('marks_setup_id',$marks_setup_id)->delete;
                return response()->json([
                    'message' => 'error',
                    'data' => $th,
                ]);
                                        }




            }


            return response()->json([
                'message' => 'success',
                'data' => $request->data,
            ]);







    // MarksMark::create($inputs);
}







    public function insertone(Request $request)
    {
        try {
                $Grading           = new Grading();
                // $Grading->letter   = $request['letter'   ];
                // $Grading->name     = $request['name'     ];
                // $Grading->from     = $request['from'     ];
                // $Grading->to       = $request['to'       ];

                // $Grading->letter   = $request[0];
                // $Grading->name     = $request[1];
                // $Grading->from     = $request[2];
                // $Grading->to       = $request[3];
                // foreach ($request->all() as $p){ 
                //     // Code Here
                //     }
                foreach ($request['colsdb'] as $i){ 
                    $Grading->$i   = $request['todb'][$i];
                    }
                $Grading->save();

        return response()->json([
                'msg' => 'insertone success ---',
                'db'      => $Grading               ,
                'Auth'    => Auth::check()          ]);
        } catch (\Throwable $th) {// ...........................
            return response()->json([
                'msg' => 'insertone failed ^^^^',
                'db'      => $th                    ,
                'Auth'    => Auth::check()          ]);
                // .............................................
        }//catch ...............................................

    }// end insertone --------------------------------------------

    // insertmulti----------------------------------------------
    public function insertmulti(Request $request)
    {
        try {




        return response()->json([
                'msg' => 'insertmulti success ---',
                'db'      => '$Grading'               ,
                'Auth'    => Auth::check()          ]);
        } catch (\Throwable $th) {// ...........................
            return response()->json([
                'msg' => 'insertmulti failed ^^^^',
                'db'      => $th                    ,
                'Auth'    => Auth::check()          ]);
                // .............................................
        }//catch ...............................................

    }// end insertmulti --------------------------------------------


    public function updateone(Request $request)
    {
        try {




        return response()->json([
                'msg' => 'updateone success ---',
                'db'      => '$Grading'               ,
                'Auth'    => Auth::check()          ]);
        } catch (\Throwable $th) {// ...........................
            return response()->json([
                'msg' => 'updateone failed ^^^^',
                'db'      => $th                    ,
                'Auth'    => Auth::check()          ]);
                // .............................................
        }//catch ...............................................

    }// end updateone --------------------------------------------


    public function updateall(Request $request)
    {
        try {

             //foreach end-----------------------------------------------------
            foreach($request['todb'] as $row){

                $Grading=  Grading::findOrFail($row['id']); 

                foreach($request['colsdb'] as $col){
                $Grading->$col = $row[$col]; 
                }
                $Grading->save(); 
            }//foreach end-----------------------------------------------------
        return response()->json([//---------------
                'msg' => 'updateall success ---',
                'db'      => $Grading             ,
                'Auth'    => Auth::check()          ]);//---------------



            } catch (\Throwable $th) {// ...........................
            return response()->json([//---------------
                'msg' => 'updateall failed ^^^^----------------------',
                'db'      => $th                    ,
                // 'Gradingtxt'      => $Gradingtxt,
                // 'Gradingtxtarray'      =>explode('"', $Gradingtxt),
                'Auth'    => Auth::check()          ]);//---------------

                // Gradingtxt.............................................
        }//catch ...............................................

    }// end updateall --------------------------------------------


    public function deleteone(Request $request)
    {
        try {


                $Grading=  Grading::findOrFail($request['id']); 
                $Grading->delete();



        return response()->json([
                'msg' => 'deleteone success ---',
                'db'      =>  $Grading                ,
                'Auth'    => Auth::check()          ]);
        } catch (\Throwable $th) {// ...........................
            return response()->json([
                'msg' => 'deleteone failed ^^^^',
                'db'      => $th                    ,
                'Auth'    => Auth::check()          ]);
                // .............................................
        }//catch ...............................................

    }// end deleteone --------------------------------------------

    public function deletemulti(Request $request)
    {
        try {




        return response()->json([
                'msg' => 'deletemulti success ---',
                'db'      => '$Grading'               ,
                'Auth'    => Auth::check()          ]);
        } catch (\Throwable $th) {// ...........................
            return response()->json([
                'msg' => 'deletemulti failed ^^^^',
                'db'      => $th                    ,
                'Auth'    => Auth::check()          ]);
                // .............................................
        }//catch ...............................................

    }// end deletemulti --------------------------------------------

    public function getone(Request $request)
    {
        try {




        return response()->json([
                'msg' => 'getone success ---',
                'db'      => '$Grading'               ,
                'Auth'    => Auth::check()          ]);
        } catch (\Throwable $th) {// ...........................
            return response()->json([
                'msg' => 'getone failed ^^^^',
                'db'      => $th                    ,
                'Auth'    => Auth::check()          ]);
                // .............................................
        }//catch ...............................................

    }// end getone --------------------------------------------

    public function getmulti(Request $request)
    {
        try {




        return response()->json([
                'msg' => 'getmulti success ---',
                'db'      => '$Grading'               ,
                'Auth'    => Auth::check()          ]);
        } catch (\Throwable $th) {// ...........................
            return response()->json([
                'msg' => 'getmulti failed ^^^^',
                'db'      => $th                    ,
                'Auth'    => Auth::check()          ]);
                // .............................................
        }//catch ...............................................

    }// end getmulti --------------------------------------------

    public function getall(Request $request)
    {
        try {

$Grading=Grading::all();


        return response()->json([
                'msg' => 'getall success:)',
                'db'      => $Grading,
                'Auth'    => Auth::check() , ]);
        } catch (\Throwable $th) {// ...........................
            return response()->json([
                'msg' => 'getall failed:( ^^^^',
                'db'      => $th                    ,
                'Auth'    => Auth::check()          ]);
                // .............................................
        }//catch ...............................................

    }// end getall --------------------------------------------








    // $i=0;
                // $Grading = Grading::where('id', $request['id']);
                // foreach ($request['fields'] as $key => $value) {
                //      $i++;
                //                 //          ->where('field_1', red_1); // Desired output
                //      $Grading->where("where(field_{$i},".$value."_1)");
                // }
                // $results = $Grading->get();











}
