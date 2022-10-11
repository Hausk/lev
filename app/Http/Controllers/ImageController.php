<?php
    
namespace App\Http\Controllers;

use App\Models\ImageModel;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;
use Image;
    
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info('Showing the user profile for user: ');
        $images = ImageModel::all();
        return view('images.index', ['images' => $images]);
    }
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        if($request->hasFile('image')) {
            $image = Image::make($request->file('image'));
            /**
             * Main Image Upload on Folder Code
             */
            $imageName = time().'-'.$request->file('image')->getClientOriginalName();
            $destinationPath = public_path('images/standard/');
            $image->save($destinationPath.$imageName);
            /**
             * Generate Thumbnail Image Upload on Folder Code
             */
            $destinationPathThumbnail = public_path('images/thumbnail/');
            $image->save($destinationPathThumbnail.$imageName, 50);

            $imagemodel= new ImageModel();
            $imagemodel->name=time().'-'.$request->file('image')->getClientOriginalName();
            $imagemodel->category='Animaux';
            $imagemodel->save();

            /**
             * Write Code for Image Upload Here,
             *
             * $upload = new Images();
             * $upload->file = $imageName;
             * $upload->save();            
            */
            return back()
                ->with('success','Image Upload successful')
                ->with('imageName',$imageName);
        }
       
        return back();
    }
    /**
     * Display a listing of the resource.
     * @param \App\Models\ImageModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageModel $imageModel)
    {
        $this->authorize('delete', $imageModel);
 
        $imageModel->delete();
 
        return redirect(route('image.index'));
    }
}
