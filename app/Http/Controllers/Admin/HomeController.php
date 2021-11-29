<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use App\Models\Event;
use App\Models\Group;
use App\Models\Ticket;
use App\Models\Organization;

use App\Http\Resources\UserResource;

class HomeController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.index', compact('admin'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function tickets()
    {
        $tickets = Ticket::all();
        return view('admin.tickets.index', compact('tickets'));
    }

    public function organizations()
    {
        $organizations = Organization::all();
        return view('admin.organizations.index', compact('organizations'));
    }

    public function details()
    {
        $totalUsers = User::count();
        $totalGroups = Group::count();
        $totalEvents = Event::count();
        $totalOrgs = Organization::count();
        $users = User::latest()->paginate(5);

        $data = array(
            'totalUsers' => $totalUsers,
            'totalGroups' => $totalGroups,
            'totalOrgs' => $totalOrgs,
            'totalEvents' => $totalEvents,
            'users' => UserResource::collection($users));

        return response([
            'status' => true,
            'message' => 'Details fetched successfully',
            'data' => $data]);
    }
}