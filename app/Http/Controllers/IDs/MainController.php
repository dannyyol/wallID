<?php

namespace App\Http\Controllers\IDs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\IdRequest;
use App\Http\Resources\IdCardResource;
use App\Models\IDCard;
use App\Models\Organization;
use App\Traits\FileUpload;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MainController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getUserIdcard($user_id){
        $idcard = IDCard::where('user_id', $user_id)->get();
        if($idcard->count() > 0){
            return response([
                'status' => true,
                'data' => IdCardResource::collection($idcard)
            ]);
        } else {
            return response([
                'status' => true,
                'message' => 'Id card for this user is not found',
            ]);
        }

    }

    public function getOrgIdcard(){
        $idcard = IDCard::where('organization_id', Auth()->user()->organization->id)->get();
        return response([
            'status' => true,
            'data' => IdCardResource::collection($idcard)
        ]);

    }

    public function store(IdRequest $request)
    {
        $request->validated();
        $user_id = $request->user_id ?? Auth::user()->id;
        $idcard  = IdCard::whereHas('user.organization', function ($q) use ($user_id) {
            $q->where('user_id', $user_id);
        })->get();
        if ($idcard->count() > 0) {
            return response([
                'status' => true,
                'message' => 'Id card for this user already exist',
            ]);
        }
        $passport_file = $this->verifyAndUpload($request, 'passport', 'passport');
        $logo_url = $this->verifyAndUpload($request, 'logo_url', 'logo');



        // if ($request->hasFile('passport')) {
        //     $file = $request->file('passport');
        //     $extension = $file->getClientOriginalExtension();
        //     $fileName = sha1(time()) . '.' . $extension;
        //     $path = public_path() . '/passport';
        //     $file->move($path, $fileName);
        //     $saved_path = 'passport/' . $fileName;
        // }

        // if ($request->hasFile('logo_url')) {
        //     $file = $request->file('logo_url');
        //     $ext = $file->getClientOriginalExtension();
        //     $file_name = sha1(time()) . '.' . $ext;
        //     $logo_path = public_path() . '/logo';
        //     $file->move($logo_path, $file_name);
        //     $saved_logo_path = 'logo/' . $fileName;
        // }

        // // Qr Code
        try {
            $rand_number = Str::random(30);
            $qr_image =  \QrCode::size(500)->format('png')->generate($rand_number);
            $file_name = sha1(time()) . '.png';
            $file_path = 'qrcode/' . $file_name;
            storage_path() . "/app/" . $file_path;
            Storage::disk('local')->put($file_path, $qr_image);
        } catch (\Throwable $th) {
            return response([
                'status' => false,
                'message' => 'Qr code for Id card could not be created',
            ]);
        }

        try {
            $organization = Organization::where('user_id', Auth::user()->id)->first();
            // dd($organization->first());
            $instance = IDCard::create([
                'user_id' => $user_id,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'middle_name' => $request->middle_name,
                'passport' => $passport_file ?? null,
                'id_card_number' => $organization->id_card_number,
                'organization_id' => $organization->id,
                'issued_date' => $request->issued_date,
                'expiry_date' => $request->expiry_date,
                'template_name' => $request->template_name,
                'category' => $request->category,
                'qr_code' => $rand_number,
                'qr_code_url' => $file_path,
                'logo_url' => $logo_url ?? null,
                'role' => $request->role
            ]);


            return response([
                'status' => true,
                'message' => 'Id card created Successfully',
                'data' => new IdCardResource($instance)
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }
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
    public function update(IdRequest $request, $id)
    {
        $request->validated();

        $idcard = IDCard::find($id);

        $db_passport = $idcard->passport;

        $passport_path = storage_path() . "/app/" . $db_passport;

        if ($request->hasFile('passport')) {
            if (file_exists($passport_path)) {
                unlink($passport_path);
            }

            $path = Storage::disk('local')->put($request->file('passport')->getClientOriginalName(), $request->file('passport')->get());
            $path = $request->file('passport')->store('/passport');
        }

        try {
            $organization = Organization::where('user_id', Auth::user()->id)->first();
            $instance = $idcard->update([
                'user_id' => $request->user_id,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'middle_name' => $request->middle_name,
                'passport' => $path,
                'id_card_number' => $organization->id_card_number,
                'organization_id' => Auth::user()->id,
                'issued_date' => $request->issued_date,
                'expiry_date' => $request->expiry_date,
                'template_name' => $request->template_name,
                'category' => $request->category
            ]);


            return response([
                'status' => true,
                'message' => 'Id card created Successfully',
                'data' => new IdCardResource($instance)
            ]);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        try{
            $idcard = IDCard::findOrFail($id);
            $idcard->delete();
            if($idcard->passport){
                file_exists($idcard->passport) ? unlink(public_path($idcard->passport)): '';
            }
            if($idcard->logo_url){
                file_exists($idcard->log) ? unlink(public_path($idcard->logo)): '';

            }if($idcard->qr_code_url){
                file_exists($idcard->qr_code_url) ? unlink(public_path($idcard->qr_code_url)): '';
            }
            return response([
                'status' => true,
                'message' => 'Id card deleted successfully',
            ]);
        } catch(Exception $e){
            return response([
                'status' => false,
                'message' => 'Oops! something went wrong',
            ]);

        }

    }
}
