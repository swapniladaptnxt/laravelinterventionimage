<?php
namespace App\Http\Controllers;

use Image;
use App\Models\ImageModel;
use Illuminate\Http\Request;

class WaterMarkController extends Controller
{
    public function imageWatermark(Request $request)
{
    
    {
        $this->validate($request, [
            'filename' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
         ]);
    }
        $img  = Image::make($request->file('filename'))->blur(40)->resize($request->height, $request->width);
        $img1 = Image::make($request->file('filename'))->resize(450, 400);
        // $img1->fit(800, 600, function ($constraint) {
        //     $constraint->upsize();
        // });
        $img->insert($img1, 'center');
        $img->save('images/new-image.png');

        // $img->save(public_path('images/new-image.png'));
        $img->encode('png');
        $type      = 'png';
        $new_image = 'data:image/' . $type . ';base64,' . base64_encode($img);
        return view('show_watermark',compact('new_image'));
    }

    public function create(){
        $image = ImageModel::latest()->first();
        return view('createimage', compact('image'));
    }

    public function store(Request $request)
    {
      
        {
            $this->validate($request, [
                'filename' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
             ]);
        }
        $originalImage= $request->file('filename');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path().'/thumbnail/';
        $originalPath = public_path().'/images/';
        $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
        $thumbnailImage->resize(200,200)->blur(30);
      

        $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName()); 

        $imagemodel= new ImageModel();
        $imagemodel->filename=time().$originalImage->getClientOriginalName();
        $imagemodel->save();


        return back()->with('success', 'Your images has been successfully Upload');

    }
}
