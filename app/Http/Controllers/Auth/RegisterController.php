<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\RegisterOrgRequest;

use App\Models\User;
use App\Models\Individual;
use App\Models\Organization;

use App\Handlers\EmailHandler;
use App\Http\Resources\UserResource;
use App\Handlers\NotificationHandler;

class RegisterController extends Controller
{

    use NotificationHandler, EmailHandler;

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'unique:individuals'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function register(Request $request) {

        $input = $request->all();
        $validator = $this->validator($input);

        if ($validator->passes())
        {
            $user = $this->create($input);
            $individual = Individual::create([
                'firstname' => $input['firstname'],
                'lastname' => $input['lastname'],
                'phone' => $input['phone'],
                'user_id' => $user->id
            ]);

            $this->assignRoles($user, 'individual');

            try {
                $this->sendEmailVerificationNotification($user);
            } 
            catch (\Exception $e) {
                
            }

            return redirect('account-created');
        }
        
        return back()->withErrors($validator->errors());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        try {

            $input = $request->validated();
            $user = $this->create($input);

            $individual = Individual::create([
                'firstname' => $input['firstname'],
                'lastname' => $input['lastname'],
                'phone' => $input['phone'],
                'user_id' => $user->id
            ]);

            $token = $this->createAuthToken($request->email, $request->password);
            $response = [
                'status' => true,
                'message' =>  'Account created Successfully',
                'data' => [
                    'tokens' => $token,
                    'user' => new UserResource($user)
                ]
            ];

            $this->assignRoles($user, 'individual');

            try {
                $this->sendEmailVerificationNotification($user);
            } 
            catch (\Exception $e) {
                
            }

            return response($response);

        } catch (\Exception $e) {

            if(isset($user)) 
                $user->delete();

            throw $e;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function idCardNumber($name){
        $_name = strtoupper(substr($name, 0, 3));
        $random_number =random_int(100000, 999999);
        $idcardnumber = $_name . '-' .$random_number;
        return $idcardnumber;
    }

    public function storeOrganization(RegisterOrgRequest $request)
    {
        try {

            $request->validated();
            
            $user = User::create([
                'type' => 'organization',
                'email' => $request->email,
                'username' => $request->name,
                'password' => Hash::make($request->password)]);

            $org = Organization::create([
                'name' => $request->input('name'),
                'user_id' => $user->id,
                'phone' => $request->phone,
                'id_card_number'=> $this->idCardNumber($request->name),
                'employees' => $request->input('employees')]);

            $token = $this->createAuthToken($request->email, $request->password);
            $response = [
                'status' => true,
                'message' =>  'Account created Successfully',
                'data' => [
                    'tokens' => $token,
                    'user' => new UserResource($user)
                ]
            ];

            $this->assignRoles($user, 'organization');
            
            return response($response);

        } catch (\Exception $e) {
            
            if(isset($user)) 
                $user->delete();

            if(isset($org)) 
                $org->delete();

            throw $e;
        }
    }

    public function createOrganization(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:organizations,name',
            'employees' => 'required|integer',
            'email' => 'required|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'phone' => 'required|unique:organizations,phone',
        ]);
     
        $user = User::create([
            'type' => 'organization',
            'email' => $request->email,
            'username' => $request->name,
            'password' => Hash::make($request->password)]);

        $org = Organization::create([
            'name' => $request->name,
            'user_id' => $user->id,
            'phone' => $request->phone,
            'id_card_number'=> $this->idCardNumber($request->name),
            'employees' => $request->employees
        ]);
        $this->assignRoles($user, 'organization');

        try {
            $this->sendEmailVerificationNotification($user);
        } 
        catch (\Exception $e) {
            
        }

        return redirect('login')
            ->with("success", "We just sent you a verification email. Please, check your email inbox.");
    }

    public function accountTypeView()
    {
        return view('auth.type');
    }

    public function organizationView()
    {
        return view('auth.organization');
    }

    public function verifyEmail(Request $request)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }

        $user = User::findOrFail($request->user);
        if (!$user->email_verified_at) {
            $user->email_verified_at = now();
            $user->save();

            return redirect()->to('login')->with('success', "Your account has been activated successfully !!!");
        }

        return redirect()->to('login');
    }



}
