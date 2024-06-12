<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoodleUsersController extends Controller
{
    public $url =  'http://moodle.test' . '/webservice/rest/server.php';

    public function postIndex(Request $request, $id = null)
    {
        $email = $request->email;
        $firstname = $request->firstname;
        $username = $request->username;
        $check = $request->all;
        if ($email) {

            $key = 'email';
            $value = $email;
        } elseif ($firstname) {
            $key =  'firstname';
            $value = $firstname;
        } elseif ($username) {
            $key =  'username';
            $value = $username;
        } elseif ($check) {
            $key =  'auth';
            $value = 'manual';
        } else {
            $key =  'auth';
            $value = 'manual';
        }

        $url =  env('APP_URL') . env('MOODLE_WEB_SERVICE');
        $params = [
            'wstoken' => env('MOODLE_WEB_TOKEN'),
            'wsfunction' => 'core_user_get_users',
            'moodlewsrestformat' => 'json',

            'criteria[0][key]' => $key,
            'criteria[0][value]' => $value,
        ];

        $json = Http::get($url, $params);
        $data = json_decode($json, true);



        return view('welcome', ['data' => $data]);
    }

    public function getEdit($id)
    {
        $url = env('APP_URL') . env('MOODLE_WEB_SERVICE');
        $editparams = [
            'wstoken' => env('MOODLE_WEB_TOKEN'),
            'wsfunction' => 'core_user_get_users',
            'moodlewsrestformat' => 'json',
            'criteria[0][key]' => 'id',
            'criteria[0][value]' => $id,
        ];

        $response = Http::get($url, $editparams);

        if ($response->successful()) {
            $data = $response->json();
            return response()->json($data);
        }

        return response()->json(['error' => 'Unable to fetch user data'], 500);
    }


    public function getIndex()
    {
        return view('welcome');
    }
    public function createIndex()
    {
        return view('createnew');
    }


    public function createUser(Request $request)
    {
        if ($request->id == !'') {
            $fucntion = 'core_user_update_users';
        } else {
            $fucntion = 'core_user_create_users';
        }
        $params = [
            'wstoken' => env('MOODLE_WEB_TOKEN'),
            'wsfunction' => $fucntion,
            'moodlewsrestformat' => 'json',
        ];
        $url = $this->url . '?' . http_build_query($params);
        $users =
            [
                'id' => $request->id,
                'username' => strtolower($request->username),
                'password' => $request->password,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
            ];
        $data['users'] = [$users];
        $response = Http::asForm()->post($url, $data);

        return response()->json(['success' => 'Success Operation']);
    }

    public function deleteUser(Request $request, $id)
    {
        // return dump([$id]);
        $params = [
            'wstoken' => env('MOODLE_WEB_TOKEN'),
            'wsfunction' => 'core_user_delete_users',
            'moodlewsrestformat' => 'json',
        ];
        $url = $this->url . '?' . http_build_query($params);
        $user['userids'] = [$request->id];
        $response = Http::asForm()->post($url, $user);
        return response()->json(['success' => 'Success Operation']);
    }
}
