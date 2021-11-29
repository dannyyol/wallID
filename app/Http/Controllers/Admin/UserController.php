<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index($status = null)
    {
        if ($status) {
            $users = User::where('status', $status)->latest()->paginate(10);
        }
        else {
            $users = User::latest()->paginate(10);
        }

        return $this->jsonPaginatedResponse('Users', UserResource::collection($users));
    }

    public function updateStatus($id, $status)
    {
        $user = User::findOrFail($this->decodeId($id));
        $user->status = $status;
        $user->save();

        return response([
            'status' => true,
            'message' => 'User status updated successfully',
            'data' => new UserResource($user)]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($this->decodeId($id));
        $user->delete();

        return response([
            'status' => true,
            'message' => 'User deleted successfully']);
    }
}
