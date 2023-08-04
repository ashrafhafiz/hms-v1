<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait UploadFileTrait
{
    public function verifyAndStoreImageFile(Request $request, $input_name, $folder_name, $disk, $imageable_id, $imageable_type) {
        if ($request->hasFile($input_name)) {

            // Check Image
            if (!$request->file($input_name)->isValid()) {
                flash('Invalid Image!')->error()->importamt();
                return redirect()->back()->withInput();
            }

            $name = Str::slug($request->input('name_en'));
            $filename = $name . '_' . time() . '.' . $request->file($input_name)->getClientOriginalExtension();

            // Insert Image
            $uploadedImage = new Image();
            $uploadedImage->file_url = $filename;
            $uploadedImage->imageable_id = $imageable_id;
            $uploadedImage->imageable_type = $imageable_type;
            $uploadedImage->save();

            return $request->file($input_name)->storeAs($folder_name, $filename, $disk);

        }
    }

}
