<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\BlogTag;
use App\Models\BlogCategory;
use App\Models\BlogLocalization;
use Modules\SSO\Models\SSOEvent;
use Modules\SSO\Models\SSOEventLocalization;

use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SSOEventController extends Controller
{
    # construct
    public function __construct()
    {
        $this->middleware(['permission:blogs'])->only('index');
        $this->middleware(['permission:add_blogs'])->only(['create', 'store']);
        $this->middleware(['permission:edit_blogs'])->only(['edit', 'update']);
        $this->middleware(['permission:publish_blogs'])->only(['updateStatus']);
        $this->middleware(['permission:delete_blogs'])->only(['delete']);
    }

    # blog list
    public function index(Request $request)
    {
        $searchKey = null;
        $is_published = null;

        $blogs = SSOEvent::oldest();
        if ($request->search != null) {
            $blogs = $blogs->where('title', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }


        if ($request->is_published != null) {
            $blogs = $blogs->where('is_active', $request->is_published);
            $is_published    = $request->is_published;
        }


        $blogs = $blogs->paginate(paginationNumber());
        return view('backend.pages.blogSystem.events.index', compact('blogs', 'searchKey', 'is_published'));
    }


    # return view of create form
    public function create()
    {
        $categories = BlogCategory::all();
        $tags = Tag::all();
        return view('backend.pages.blogSystem.events.create', compact('categories', 'tags'));
    }

    # blog store
    public function store(Request $request)
    {
        $blog = new SSOEvent;
        $blog->title = $request->title;
        $blog->thumbnail_image = $request->image;
        $blog->banner = $request->banner;
        $blog->meta_img = $request->meta_image;

        if ($request->slug != null) {
            $blog->slug = Str::slug($request->slug);
        } else {
            $blog->slug = Str::slug($request->title) . '-' . Str::random(5);
        }

      
        $blog->short_description = $request->short_description;

        $blog->video_link = $request->video_link;
        $blog->description = $request->description;

        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;

        $blog->save();
      

        $blogLocalization = SSOEventLocalization::firstOrNew(['lang_key' => env('DEFAULT_LANGUAGE'), 'event_id' => $blog->id]);
        $blogLocalization->title = $blog->title;
        $blogLocalization->short_description = $blog->short_description;
        $blogLocalization->description = $blog->description;
        $blogLocalization->save();

        $blog->save();
        flash(localize('Event has been inserted successfully'))->success();
        return redirect()->route('admin.events.index');
    }

    # edit blog
    public function edit(Request $request, $id)
    {
        $lang_key = $request->lang_key;
        $language = Language::isActive()->where('code', $lang_key)->first();
        if (!$language) {
            flash(localize('Language you are trying to translate is not available or not active'))->error();
            return redirect()->route('admin.events.index');
        }

        $categories = BlogCategory::all();
        $tags = Tag::all();

        $blog = SSOEvent::findOrFail($id);
        return view('backend.pages.blogSystem.events.edit', compact('blog', 'categories', 'tags', 'lang_key'));
    }

    # update blog
    public function update(Request $request)
    {
        $blog = SSOEvent::findOrFail($request->id);

        if ($request->lang_key == env("DEFAULT_LANGUAGE")) {
            $blog->title = $request->title;
            $blog->slug = (!is_null($request->slug)) ? Str::slug($request->slug, '-') : Str::slug($request->name, '-') . '-' . strtolower(Str::random(5));
        
            $blog->thumbnail_image = $request->image;
            $blog->banner = $request->banner;
            $blog->meta_img = $request->meta_image;

            $blog->short_description = $request->short_description;
            $blog->description = $request->description;

            $blog->video_link = $request->video_link;


            $blog->meta_title = $request->meta_title;
            $blog->meta_description = $request->meta_description;

            $blog->save();
        }

        $blogLocalization = SSOEventLocalization::firstOrNew(['lang_key' => $request->lang_key, 'event_id' => $blog->id]);
        $blogLocalization->title = $request->title;
        $blogLocalization->short_description = $request->short_description;
        $blogLocalization->description = $request->description;

        $blog->save();
        $blogLocalization->save();

        flash(localize('Event has been updated successfully'))->success();
        return back();
    }

    # update popular 
    public function updatePopular(Request $request)
    {
        $blog = SSOEvent::findOrFail($request->id);
        $blog->is_popular = $request->is_popular;
        if ($blog->save()) {
            return 1;
        }
        return 0;
    }

    # update status 
    public function updateStatus(Request $request)
    {
        $blog = SSOEvent::findOrFail($request->id);
        $blog->is_active = $request->is_active;
        if ($blog->save()) {
            return 1;
        }
        return 0;
    }

    # delete blog
    public function delete($id)
    {
        $blog = SSOEvent::findOrFail($id);
        BlogTag::where('blog_id', $blog->id)->delete();
        $blog->delete();
        flash(localize('Event has been deleted successfully'))->success();
        return back();
    }
}
