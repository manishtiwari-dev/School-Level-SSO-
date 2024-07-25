<?php

namespace Modules\SSO\Http\Controllers;

use Modules\SSO\Models\SSOTestimonial;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $searchKey = null;
        $testimonialList = SSOTestimonial::oldest();
        if ($request->search != null) {
            $tags = $testimonialList->where('name', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }
        $testimonialList = $testimonialList->paginate(paginationNumber());

        return view('sso::testimonial.index', compact('testimonialList', 'searchKey'));
    }


    public function create()
    {
      
        return view('sso::testimonial.create');
    }

    public function store(Request $request)
    {
        $mediaFile = '';

        if ($request->hasFile('video')) {
            $file = $request->file('video');

            // Get the current timestamp
            $timestamp = now()->timestamp;

            // Get the original file extension
            $extension = $file->getClientOriginalExtension();

            // Combine timestamp and extension to create a unique filename
            $fileName = $timestamp . '.' . $extension;

            // Store the file with the new filename
            $mediaFile = $file->storeAs('uploads/media', $fileName);
        }
        $testimonialData =  new SSOTestimonial();
        $testimonialData->name = $request->name;
        $testimonialData->phone = $request->phone;
        $testimonialData->email = $request->email;
        $testimonialData->designation = $request->designation;
        $testimonialData->video_url = $mediaFile;
        $testimonialData->comment = $request->comment;
        $testimonialData->attachment=  $request->attachment;
        $testimonialData->save();
        

        flash(localize('Testimonial has been added successfully.'))->success();
        return redirect()->route('admin.testimonial.index');
    }


    public function edit($id)
    {
        $testimonialData = SSOTestimonial::findOrFail($id);
      
        return view('sso::testimonial.edit', compact('testimonialData'));
    }


    public function update(Request $request)
    {
      
        $mediaFile = '';

        if ($request->hasFile('video')) {
            $file = $request->file('video');

            // Get the current timestamp
            $timestamp = now()->timestamp;

            // Get the original file extension
            $extension = $file->getClientOriginalExtension();

            // Combine timestamp and extension to create a unique filename
            $fileName = $timestamp . '.' . $extension;

            // Store the file with the new filename
            $mediaFile = $file->storeAs('uploads/media', $fileName);
        }

        $testimonialData = SSOTestimonial::findOrFail($request->id);
        $testimonialData->name = $request->name;
        $testimonialData->email = $request->email;
        $testimonialData->phone = $request->phone;
        $testimonialData->designation = $request->designation;
        $testimonialData->video_url = !empty($mediaFile)  ?  $mediaFile : $request->old_video;
        $testimonialData->comment = $request->comment;
        $testimonialData->attachment=  $request->attachment;
        $testimonialData->save();

        flash(localize('Testimonial has been Updated successfully.'))->success();
        return redirect()->route('admin.testimonial.index');
    }

    public function delete($id)
    {

        $testimonialData = SSOTestimonial::findOrFail($id);
        $testimonialData->delete();

        flash(localize('Testimonial has been Deleted successfully.'))->success();
        return redirect()->route('admin.testimonial.index');
    }

}
