<?php

namespace App\Traits;
use Illuminate\Http\Request;

trait ImageUploadTraits {

    // Upload new Image
     public function imageUpload(Request $request, $fileName, $path){

        if( $request->file($fileName) ){
            $images = $request->file($fileName);

            $imageName          = $request->slug . rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
            $imagePath          = 'public/backend/images/' . $path . '/';
            $images->move($imagePath, $imageName);

            return $imagePath . $imageName;
            // $category->category_img        =  $imagePath . $imageName;
        }

     }


     // Delete & Upload new Image
     public function deleteImageAndUpload(Request $request, $fileName, $path, $existingImg = null){

        if( $request->file($fileName) ){
            $images = $request->file($fileName);

            if ( !is_null($existingImg) && file_exists($existingImg))  {
                unlink($existingImg); // Delete the existing category_img
            }

            $imageName          = $request->slug . rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
            $imagePath          = 'public/backend/images/' . $path . '/';
            $images->move($imagePath, $imageName);

            return $imagePath . $imageName;
            // $category->category_img        =  $imagePath . $imageName;
        }

            // If no new file is uploaded, return the existing image path (unchanged)
            return $existingImg;
     }

}
