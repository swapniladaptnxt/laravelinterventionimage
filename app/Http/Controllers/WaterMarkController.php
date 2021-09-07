<?php
namespace App\Http\Controllers;

use App\Models\ImageModel;
use Illuminate\Http\Request;
use Image;

class WaterMarkController extends Controller
{
    public function imageWatermark(Request $request)
    {

        {
            $this->validate($request, [
                'filename' => 'image|required|mimes:jpeg,png,jpg,gif,svg',
            ]);
        }

        $img                            = Image::make($request->file('filename'))->blur(40)->resize($request->height, $request->width);
        list($width_orig, $height_orig) = getimagesize($request->file('filename'));
        $ratio_orig                     = $width_orig / $height_orig;
        if ( $request->width / $request->height > $ratio_orig) {
            $width = $request->height * $ratio_orig;
        } else {
            $height =  $request->width / $ratio_orig;
        }
        $img1 = Image::make($request->file('filename'))->resize($request->width, $height);
        // $img1->fit(800, 600, function ($constraint) {
        //     $constraint->upsize();
        // });
        $img->insert($img1, 'center');
        // $img->save('images/new-image.png');

        // $img->save(public_path('images/new-image.png'));
        $img->encode('png');
        $type      = 'png';
        $new_image = 'data:image/' . $type . ';base64,' . base64_encode($img);
        return view('show_watermark', compact('new_image'));
    }

    public function create()
    {
        $image = ImageModel::latest()->first();
        return view('createimage', compact('image'));
    }

    public function store(Request $request)
    {

        {
            $this->validate($request, [
                'filename' => 'image|required|mimes:jpeg,png,jpg,gif,svg',
            ]);
        }
        $originalImage  = $request->file('filename');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath  = public_path() . '/thumbnail/';
        $originalPath   = public_path() . '/images/';
        $thumbnailImage->save($originalPath . time() . $originalImage->getClientOriginalName());
        $thumbnailImage->resize(200, 200)->blur(30);

        $thumbnailImage->save($thumbnailPath . time() . $originalImage->getClientOriginalName());

        $imagemodel           = new ImageModel();
        $imagemodel->filename = time() . $originalImage->getClientOriginalName();
        $imagemodel->save();

        return back()->with('success', 'Your images has been successfully Upload');

    }
}
