<?php
namespace App\Traits;
use App\Models\Company;
use Illuminate\Http\Request;


trait FileUpload
{
    public function verifyAndUpload(Request $request, $fieldname, $directory ) {
        if( $request->hasFile( $fieldname ) ) {
            if (!$request->file($fieldname)->isValid()) {
                return response(['status'=> false, "message"]);
            }
            return $request->file($fieldname)->store($directory, 'public');
        }
        return null;
    }

  


    
}
