<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class HelpController extends Controller
{
    //
       public function showcols(Request $request){

        return response()->json([
            'message' =>'showcols',
            'data' =>$request->all(),
            'data2' =>$request->all(),
        ]);

       }



    public function help(){
        try{
            // $database_name = DB::connection('name')->getDatabaseName();
            // $database_name = "devtrigger";
            // $tables = DB::select("SELECT table_name FROM information_schema.tables WHERE table_schema = '{$database_name}'");
            // foreach($tables as $key => $table){
            //     $table_names[] = $table->table_name;
            // }
            // return $table_names;
        //   }
        //   catch(\Exception $e){
        //     return false;
        //   }

        $database = Config::get('database.connections.mysql.database');

            //   $tables = DB::select("SELECT table_name FROM information_schema.tables WHERE table_schema = '{$database_name}'");
              $tables = DB::select("SELECT table_name FROM information_schema.tables WHERE table_schema = '{$database}'");

        // $result = "SHOW TABLES FROM ".$database;
        // $rows = DB::select("SELECT table_name FROM information_schema.tables WHERE table_schema = '{$db_name}' AND table_name like '%{$search}%'");

        // $table_names = [];
        // foreach($rows as $row)
        // {
        //     $table_names[] = $row->table_name;
        // }

        // return $table_names;
        // $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
        // $rows = DB::select("SELECT * FROM '{$database}'.tables WHERE table_schema = '{$database}' AND table_name like '%{$search}%'");
        // $rows = DB::getSchemaBuilder()->getColumnListing($table);
        
        
        // $rows =DB::select('SHOW TABLES');
        // $table_names = [];
        // foreach($rows as $row)
        // {
        //     $table_names[] = $row->table_name;
        // }

        // return $table_names;





      $table1=  Schema::getColumnListing($tables[0]->table_name);

            return response()->json([
                'message' =>$database,
                'message2' =>$tables,
                'message3' =>$table1
                // 'message' =>$table_names $table_names
                
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => '  error data:' . $th
            ]);
        }
    }  

    
}
