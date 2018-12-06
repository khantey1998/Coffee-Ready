<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/coffee-ready-firebase-adminsdk-1yzn9-6b86e05ba8.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://coffee-ready.firebaseio.com/')
        ->create();

        $database = $firebase->getDatabase();

        $newPost = $database
        ->getReference('blog/posts')
        ->push([
        'title' => 'khantey' ,

        ]);
        echo '<pre>';
        print_r($newPost->getvalue());
    }

}
