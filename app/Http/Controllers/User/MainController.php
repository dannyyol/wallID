<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use App\Http\Resources\UserResource;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return response([
            'status' => true,
            'message' => 'User',
            'data' => new UserResource($user)
        ]);
    }

    public function roles()
    {
        return response([
            'status' => true,
            'message' => 'Roles',
            'data' => Auth::user()->roles
        ]);
    }

    public function notifications()
    {
        return response([
            'status' => true,
            'message' => 'Notifications',
            'data' => Auth::user()->unreadNotifications
        ]);
    }    

    public function getUser($id)
    {
        $user = User::findOrFail($this->decodeId($id));
        return response([
            'status' => true,
            'message' => 'User',
            'data' => new UserResource($user)
        ]);
    }


    public function getUserByuserName(Request $request){

        $username = $request->get('username');

        // dd($username);

        $user = User::where('username', $username)->first();
        if ($user) {
            return response([
                'status' => true,
                'message' => 'User',
                'data' => new UserResource($user)
            ]);
        }
        else {
            return response([
                'status' => false,
                'message' => 'User with the Username not found',
                'data' => null
            ]);
        }
    }

    

    public function profile($username)
    {
        $user = User::where('username', $username)->first();
        if ($user) {
            return response([
                'status' => true,
                'message' => 'User',
                'data' => new UserResource($user)
            ]);
        }
        else {
            return response([
                'status' => false,
                'message' => 'User with the Username not found',
                'data' => null
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
