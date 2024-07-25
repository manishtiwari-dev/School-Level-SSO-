<?php

namespace Modules\SSO\Http\Controllers;

use Modules\SSO\Models\SSOBook;
use Modules\SSO\Models\SSOClasse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SSO\Models\SSOSection;
use Modules\SSO\Models\SSOExam;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $searchKey = null;
        $bookList = SSOBook::with('classes')->oldest();
        if ($request->search != null) {
            $tags = $bookList->where('name', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }
        $bookList = $bookList->paginate(paginationNumber());

        return view('sso::book.index', compact('bookList', 'searchKey'));
    }

    public function create()
    {

        $classlist = SSOClasse::all();
        $examlist = SSOExam::all();

        return view('sso::book.create', compact('classlist', 'examlist'));
    }

    public function store(Request $request)
    {

        $book =    SSOBook::create([
            'content' => $request->content,
            'class_id' => $request->class_id,
            'book_title' => $request->book_title,
            'attachment' =>  $request->attachment,
            'exam_id' => $request->exam_id
        ]);


        flash(localize('Book has been added successfully.'))->success();
        return redirect()->route('admin.book.index');
    }


    public function edit($id)
    {
        $bookList = SSOBook::findOrFail($id);
        $classlist = SSOClasse::all();
        $examlist = SSOExam::all();

        return view('sso::book.edit', compact('bookList', 'classlist', 'examlist'));
    }


    public function update(Request $request)
    {
      
        $book = SSOBook::findOrFail($request->id);
        $book->class_id = $request->class_id;
        $book->content = $request->content;
        $book->book_title = $request->book_title;
        $book->attachment    =$request->attachment;
        $book->exam_id    = $request->exam_id;
        $book->save();


        flash(localize('Book has been Updated successfully.'))->success();
        return redirect()->route('admin.book.index');
    }


    # update status 
    public function updateStatus(Request $request)
    {
        $bookList = SSOBook::findOrFail($request->id);
        $bookList->status = $request->status;
        if ($bookList->save()) {
            return 1;
        }
        return 0;
    }


    public function delete($id)
    {

        $bookList = SSOBook::findOrFail($id);
        $bookList->delete();

        flash(localize('Book has been Deleted successfully.'))->success();
        return redirect()->route('admin.book.index');
    }
}
