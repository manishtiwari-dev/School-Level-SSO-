<?php

namespace Modules\SSO\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Language;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\SSO\Models\SSOPage;
use Modules\SSO\Models\SSOPageLocalization;

class PagesController extends Controller
{
    

    # construct
    public function __construct()
    {
        $this->middleware(['permission:SSOPages'])->only('index'); 
        $this->middleware(['permission:add_SSOPages'])->only(['create', 'store']);  
        $this->middleware(['permission:edit_SSOPages'])->only(['edit', 'update']);  
        $this->middleware(['permission:delete_SSOPages'])->only(['delete']);  
    }
    
     # SSOPage list
     public function index(Request $request)
     {
         $searchKey = null;
         $pages = SSOPage::latest();
         if ($request->search != null) {
             $pages = $pages->where('title', 'like', '%' . $request->search . '%');
             $searchKey = $request->search;
         }
 
         $pages = $pages->paginate(paginationNumber());
         return view('sso::pages.index', compact('pages', 'searchKey'));
     }

    # return view of create form
    public function create()
    { 
        return view('sso::pages.create');
    }

     # SSOPage store
    public function store(Request $request)
    {  
        $SSOPage = new SSOPage;
        $SSOPage->title = $request->title;
        $SSOPage->slug             = Str::slug($request->title);  
        $SSOPage->content          = $request->page_description; 
        $SSOPage->meta_title       = $request->meta_title;
        $SSOPage->meta_description = $request->meta_description; 
        $SSOPage->meta_image       = $request->meta_image; 
  
        $SSOPage->save();

        $SSOPageLocalization           = SSOPageLocalization::firstOrNew(['lang_key' => env('DEFAULT_LANGUAGE'), 'page_id' => $SSOPage->id]);
        $SSOPageLocalization->title    = $request->title;
        $SSOPageLocalization->content  = $request->page_description;  
        $SSOPageLocalization->save();

        flash(localize('Page has been created successfully'))->success();
        return redirect()->route('admin.pages.index');
    }

    # edit SSOPage
     public function edit(Request $request, $id)
    {
        $lang_key = $request->lang_key;
        $language = Language::isActive()->where('code', $lang_key)->first();
        if(!$language){ 
            flash(localize('Language you are trying to translate is not available or not active'))->error();
            return redirect()->route('admin.SSOPages.index');
        } 
        $page = SSOPage::findOrFail($id);
        return view('sso::pages.edit', compact('page', 'lang_key'));
    }

    # update SSOPage
    public function update(Request $request)

    {
      
        $SSOPage = SSOPage::findOrFail($request->id); 

        if($request->lang_key == env("DEFAULT_LANGUAGE")){
            $SSOPage->title = $request->title; 
            $SSOPage->slug = (!is_null($request->slug)) ? Str::slug($request->slug, '-') : Str::slug($request->title, '-');  
         
            $SSOPage->content = $request->page_description;
            
            $SSOPage->meta_title = $request->meta_title;
            $SSOPage->meta_description = $request->meta_description;  
            $SSOPage->meta_image       = $request->meta_image;    
            
            $SSOPage->save();  
        } 

        $SSOPageLocalization = SSOPageLocalization::firstOrNew(['lang_key' => $request->lang_key, 'page_id' => $SSOPage->id]);
        $SSOPageLocalization->title    = $request->title;
        $SSOPageLocalization->content  = $request->page_description;  
        $SSOPageLocalization->save();

        $SSOPage->save(); 
        $SSOPageLocalization->save(); 
        flash(localize('Page has been updated successfully'))->success();
        return back(); 
    }

    # delete SSOPage
    public function delete($id)
    {
        $SSOPage = SSOPage::findOrFail($id);  
        $SSOPage->delete();  
        flash(localize('Page has been deleted successfully'))->success();
        return back();
    }
    
}
