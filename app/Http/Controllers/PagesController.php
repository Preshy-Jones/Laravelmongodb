<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




class PagesController extends Controller
{

        public function newuser(Request $request) {
//            return response()->json([$request]);
            $file = '../resources/views/pages/users.txt';
            $userData =  json_decode(file_get_contents($file));
            $users = $request->json()->all();
            $newId = count($userData) + 1;
            //print_r($users['name']);
            $user = array( "id"=> $newId, "name"=> $users['name'], "username"=> $users['username'], "email"=> $users['email']);
            array_push($userData, $user);
            file_put_contents($file, json_encode($userData));
            print_r('User added successfully');
            //return response()->json($userData);
        }       
            //  return response()->json([
            //      "message" => "student record created"
            //  ], 201);
            // }
//     public function delete(){
        
//         $jsonurl = "http://jsonplaceholder.typicode.com/users"; 
//         $json = file_get_contents($jsonurl);


//         //global $userData;
//         global $userData;

//         $userData = json_decode($json);

//         $lastObjIndex = count($userData) -1;
//         //print_r($lastObjIndex);
//         array_splice($userData, $lastObjIndex,1);
//         //print_r('last user deleted');
//         echo json_encode($userData);
//     }
    


//     public function users(){
//         $userData;
// //       return view('pages.index');
//         return response()->json($userData);

//     }

    
//     public function name(){
//         global $userData;
//         // print_r($userData[0]->name);
//         $names = [];
//         for ($i=0; $i < count($userData); $i++) {
//             array_push($names, $userData[$i]->name);
//         }
    
//         print_r(json_encode($names));
//     }

 };
