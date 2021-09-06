<?php
namespace App\Http\Controllers;

use Image;

class WaterMarkController extends Controller
{
    public function imageWatermark()
    {
        $img  = Image::make(public_path('images/demo.jpg'))->blur(40)->resize(1000, 500);
        $img1 = Image::make(public_path('images/demo.jpg'))->resize(450, 400);
        // $img1->fit(800, 600, function ($constraint) {
        //     $constraint->upsize();
        // });
        $img->insert($img1, 'center');
        $img->save(public_path('images/new-image.png'));
        $img->encode('png');
        $type      = 'png';
        $new_image = 'data:image/' . $type . ';base64,' . base64_encode($img);
        return view('show_watermark', compact('new_image'));
    }
}
