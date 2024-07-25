<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Modules\SSO\Models\SSOPage;

class AboutUsController extends Controller
{
    # get 
    public function index(Request $request,$slug)
    {
        $page_data=SSOPage::where('slug',$slug)->first();
        return getView('pages.dyanamic_page', ['page_data'=>$page_data]);
    }


}

