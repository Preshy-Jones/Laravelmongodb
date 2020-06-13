<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


*/

// Route::get('/', function () {
    
//     return view('welcome');
// });

// Route::get('/hello', function () {
    
//     return 'hello world';
// });

// Route::get('/yo', function(){

//     return view('pages.yo');
// });


//$userData;
global $userData;
$jsonurl = "http://jsonplaceholder.typicode.com/users"; 
$json = file_get_contents($jsonurl);

$userData =$json;
//global $friends;
//$friends = array("Ross","Monica","Phoebe","Rachel","Joey","Chandler");
//$userData = json_decode($json);

//$_SESSION['userData'] = json_decode($json);
//delete last object in array


Route::get('/users', function(){


//    print_r(json_encode($users));
    //print_r(count($data));
    $file = '../resources/views/pages/users.txt';   
    print_r(file_get_contents($file));

  //  print_r('success');
//            name();
        //$this->name();
  //      global $friends;
    //    print_r($friends);    
//        global $userData;
      //  print_r($_SESSION['userData']);
//        print_r($userData);
  //      echo json_encode($userData);
//        return response()->json($userData);

});

Route::get('/populate', function(){

  global $userData;
  $file = '../resources/views/pages/users.txt';
  $data = json_decode(file_get_contents($file));
  $userDataDec = json_decode($userData);
  $users = [];
  for ($i = 0; $i < count($userDataDec); $i++) {
      $user = array( "id"=> $userDataDec[$i]->id, "name"=> $userDataDec[$i]->name, "username"=> $userDataDec[$i]->username, "email"=> $userDataDec[$i]->email);
      array_push($users, $user);
  };
  file_put_contents($file, json_encode($users));
  print_r('Users added successfully');
});


Route::get('/delete', function(){
//    global $userData;
  //  global $friends;
    $file = '../resources/views/pages/users.txt';

    $users =  json_decode(file_get_contents($file));
//    print_r($users);
     $lastObjIndex = count($users) -1;
//     //print_r($lastObjIndex);
    
     array_splice($users, $lastObjIndex,1);
     //print_r($users);
     file_put_contents($file, json_encode($users));
     print_r('Last Object deleted successfully');
//     print_r($users);   
//     //print_r('last user deleted');
// //    print_r($friends);

//     echo json_encode($userData);
//    $userData = $userData;
    

});

Route::get('/deleteall', function(){

    $file = '../resources/views/pages/users.txt';

    $users =  json_decode(file_get_contents($file));
    $length = count($users);
//     //print_r($lastObjIndex);
    
     array_splice($users, 0,$length);
     //print_r($users);
     file_put_contents($file, json_encode($users));
     print_r('All objects  deleted successfully');
//    $userData = $userData;
    


});

Route::get('/name', function(){
  $file = '../resources/views/pages/users.txt';

  $users =  json_decode(file_get_contents($file));

    // print_r($userData[0]->name);
    $names = [];
    for ($i=0; $i < count($users); $i++) {
        array_push($names, $users[$i]->name);
    }

    print_r(json_encode($names));

  // echo json_encode($userData);
  //  return response()->json($userData);

});


Route::get('/username', function(){
    $file = '../resources/views/pages/users.txt';

    $users =  json_decode(file_get_contents($file));

    // print_r($userData[0]->name);
    $usernames = [];
    for ($i=0; $i < count($users); $i++) {
        array_push($usernames, $users[$i]->username);
    }

    print_r(json_encode($usernames));

  //echo json_encode($userData);
//    return response()->json($userData);

});

Route::get('/email', function(){
    $file = '../resources/views/pages/users.txt';

    $users =  json_decode(file_get_contents($file));

    // print_r($userData[0]->name);
   // print_r(gettype($userData));
    $emails = [];
    for ($i=0; $i < count($users); $i++) {
        array_push($emails, $users[$i]->email);
    }
//   print_r(gettype($emails));
    print_r(json_encode($emails));

  //echo json_encode($userData);
//    return response()->json($userData);

});

Route::post('/newuser', 'PagesController@newuser');

    //get all users
// Route::get('/users', 'PagesController@users');

// Route::get('/name', 'PagesController@name');

// Route::get('/delete', 'PagesController@delete');


// Route::get('/users/{id}', function($id){
//     return 'This is user '.$id;
// });



