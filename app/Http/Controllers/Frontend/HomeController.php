<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Modules\SSO\Models\SSOTestimonial;
use Modules\SSO\Models\SSOSyllabus;
use Modules\SSO\Models\SSOStudent;
use Modules\SSO\Models\SSOExam;
use Modules\SSO\Models\SSOScholarship;
use Modules\SSO\Models\SSOWinner;
use Modules\SSO\Models\SSOGallery;
use PDF;
use Modules\SSO\Models\SSOEvent;
use Illuminate\Support\Facades\Storage;
use Modules\SSO\Models\SSOBlog;
use Modules\SSO\Models\SSOModelPaper;
use Modules\SSO\Models\SSOBook;

use App\Models\Country;

class HomeController extends Controller
{
    # set theme
    public function theme($name = "")
    {
        session(['theme' => $name]);
        return redirect()->route('home');
    }

    # homepage

    public function index()
    {

        $sliders = $contents = [];

        if (getSetting('hero_sliders') != null) {
            $sliders = json_decode(getSetting('hero_sliders'));
        }

        if (getSetting('home_page_contents') != null) {
            $contents = json_decode(getSetting('home_page_contents'));
        }

        $contentObj = '';
        if (!empty($contents) && sizeof($contents) > 0)
            $contentObj = $contents[0];

        $certificates = [];
        if (getSetting('certificates') != null) {
            $certificates = json_decode(getSetting('certificates'));
        }


        $SSOTestimonial = SSOTestimonial::latest()->get();
        $SSOSyllabus = SSOSyllabus::latest()->where('status', 1)->get();
        $SSOStudent = SSOStudent::with('institute')->latest()->where('status', 1)->get();
        $blogs = SSOBlog::isActive()->latest()->take(3)->get();
        $events = SSOEvent::where('is_active', 1)->latest()->take(4)->get();

        return getView('pages.home', [
            'blogs' => $blogs,
            'sliders' => $sliders,
            'certificates' => $certificates,
            'contentObj' => $contentObj,
            'SSOTestimonial' => $SSOTestimonial,
            'SSOSyllabus' => $SSOSyllabus,
            'SSOStudent' => $SSOStudent,
            'events' => $events
        ]);
    }


    # contact us page
    public function contactUs()
    {

        return getView('pages.contactUs');
    }


    # all blogs
    public function allBlogs(Request $request)
    {
        $searchKey  = null;
        $blogs = SSOBlog::isActive()->latest();

        if ($request->search != null) {
            $blogs = $blogs->where('title', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }

        if ($request->category_id != null) {
            $blogs = $blogs->where('blog_category_id', $request->category_id);
        }

        $blogs = $blogs->paginate(paginationNumber(5));
        return getView('pages.blogs.index', ['blogs' => $blogs, 'searchKey' => $searchKey]);
    }

    # blog details
    public function showBlog($slug)
    {
        $blog = SSOBlog::where('slug', $slug)->first();
        return getView('pages.blogs.blogDetails', ['blog' => $blog]);
    }



    public function syllabus()
    {
        $syllabus = SSOSyllabus::where('status', 1)->get();
        return getView('pages.syllabus.index', ['syllabus' => $syllabus]);
    }



    
    
    public function referenceBook()
    {
        $SSOBook = SSOBook::with('classes')->where('status', 1)->get();
        return getView('pages.referenceBook.index', ['SSOBook' => $SSOBook]);
    }

    public function subject()
    {
        $syllabus = SSOSyllabus::where('status', 1)->get();
        return getView('pages.subject.index', ['syllabus' => $syllabus]);
    }


    public function modelPaper()
    {
        $SSOModelPaper = SSOModelPaper::with('classes')->where('status', 1)->get();
        return getView('pages.modelPaper.index', ['SSOModelPaper' => $SSOModelPaper]);
    }




    # syllabus details
    public function showSyllabus($slug)
    {
        $syllabus = SSOSyllabus::where('slug', $slug)->first();
        return getView('pages.syllabus.details', ['syllabus' => $syllabus]);
    }

    # all events
    public function allEvents(Request $request)
    {
        $searchKey  = null;
        $events = SSOEvent::isActive()->latest();

        if ($request->search != null) {
            $events = $events->where('title', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }

        $events = $events->paginate(paginationNumber(5));
        return getView('pages.events.index', ['events' => $events, 'searchKey' => $searchKey]);
    }


    public function showEvents($slug)
    {
        $SSOEvent = SSOEvent::where('slug', $slug)->first();
        return getView('pages.events.details', ['SSOEvent' => $SSOEvent]);
    }


    # Gallery details
    public function gallery()
    {
        $SSOGallery = SSOGallery::where('status', 1)->get();

        return getView('pages.gallery', compact('SSOGallery'));
    }


    public function scholarship()
    {
        $SSOScholarship = SSOScholarship::where('status', 1)->first();
        return getView('pages.scholarship', compact('SSOScholarship'));
    }

    # winner details
    public function winner()
    {
        $SSOWinner = SSOWinner::where('status', 1)->get();
        return getView('pages.winners.index', compact('SSOWinner'));
    }

    public function showWinner($slug)
    {
        $SSOWinner = SSOWinner::where('slug', $slug)->first();
        return getView('pages.winners.details', ['SSOWinner' => $SSOWinner]);
    }



    # exam details

    public function aboutExam()
    {
        $SSOExam = SSOExam::where('status', 1)->first();
        return getView('pages.aboutExam', compact('SSOExam'));
    }

    public function examPreprations()
    {
        $SSOExam = SSOExam::where('status', 1)->first();
        return getView('pages.examPreprations', compact('SSOExam'));
    }


    public function examDates()
    {
        $SSOExam = SSOExam::where('status', 1)->first();
        return getView('pages.examDates', compact('SSOExam'));
    }

    #  downloadBrochure
    public function downloadBrochure()
    {


        
        // if (getSetting('sso_brochure') != null) {
        //     $sso_brochure = getSetting('sso_brochure');

        //     $myFile = Storage::url($sso_brochure);



        //     return response()->download($myFile);
        // }

        //   $view= getView('pages.pdf-brouchre', compact('country_data'));

        //$country_data = Country::where('is_active', 1)->get();

        //     $pdf = PDF::loadView($view, [
        //         'country_data'       => $country_data,
        //        // 'state_list'       => $country_datastate_list,

        //     ]);

        //     $pdf->download('SSO#'. 'brochure' .'.pdf');



    }
}
