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
        $size       = 80;
        $img        = Image::make($request->file('filename'))->blur(40)->resize($request->height, $request->width);
        $dimensions = getimagesize($request->file('filename'));
        $width      = $dimensions[0];
        $height     = $dimensions[1];
        if (is_array($size)) {
            $new_width  = $size[0];
            $new_height = $size[1];
        } else {
            $new_width  = ceil(($size / 100) * $width);
            $new_height = ceil(($size / 100) * $height);
        }
        $img1 = Image::make($request->file('filename'))->resize($new_width, $new_height);
        $img->insert($img1, 'center');
        $img->encode('png');
        $type           = 'png';
        $modified_image = 'data:image/' . $type . ';base64,' . base64_encode($img);
        echo json_encode([
            "modified_image" => $modified_image,
        ]);
    }
    public function create()
    {
        $image = ImageModel::latest()->first();
        return view('createimage', compact('image'));
    }
}
