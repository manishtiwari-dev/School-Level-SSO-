<?php

namespace Modules\SSO\Http\Controllers;

use Modules\SSO\Models\SSOGallery;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function index(Request $request)
    {
        $galleryData = SSOGallery::oldest();
        $galleryData = $galleryData->paginate(paginationNumber());

        return view('sso::gallery.index', compact('galleryData'));
    }

    public function create()
    {
      

        return view('sso::gallery.create');
    }

    public function store(Request $request)
    {
       

        $galleryData =  new SSOGallery();
        $galleryData->name = $request->name;
        $galleryData->type = $request->type;
        $galleryData->content = $request->content;
        $galleryData->attachment=  $request->attachment;
        $galleryData->save();




        flash(localize('Gallery has been added successfully.'))->success();
        return redirect()->route('admin.gallery.index');
    }


    public function edit($id)
    {
        $galleryData = SSOGallery::findOrFail($id);
      
        return view('sso::gallery.edit', compact('galleryData'));
    }


    public function update(Request $request)
    {
       

        $galleryData = SSOGallery::findOrFail($request->id);
        $galleryData->name = $request->name;
        $galleryData->type = $request->type;
        $galleryData->content = $request->content;
        $galleryData->attachment =  $request->attachment;
        $galleryData->save();


        flash(localize('Gallery has been Updated successfully.'))->success();
        return redirect()->route('admin.gallery.index');
    }
    # update status 
    public function updateStatus(Request $request)
    {
        $galleryData = SSOGallery::findOrFail($request->id);
        $galleryData->status = $request->status;
        if ($galleryData->save()) {
            return 1;
        }
        return 0;
    }

    public function delete($id)
    {

        $galleryData = SSOGallery::findOrFail($id);
        $galleryData->delete();

        flash(localize('Gallery has been Deleted successfully.'))->success();
        return redirect()->route('admin.gallery.index');
    }
}
