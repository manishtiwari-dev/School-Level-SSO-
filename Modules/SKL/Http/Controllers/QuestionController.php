<?php

namespace Modules\SKL\Http\Controllers;

use Modules\SKL\Models\SKLQuizQuestion;
use Modules\SKL\Models\SKLQuestionOption;
use Modules\SKL\Models\SKLQuizze;
use Modules\SKL\Models\SKLQuizHistory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $searchKey = null;
        $search = $request->search;
        $quizelist = SKLQuizze::all();
        $questionlist =  SKLQuizQuestion::with('quizzes');
        if ($request->search != null) {
            // $questionlist = $questionlist->WhereHas('quizzes', function ($query) use ($search) {
            //     $query->where("title", "LIKE", "%{$search}%");;
            // });
            $questionlist = $questionlist->where('question_type', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }
        $questionlist = $questionlist->paginate(paginationNumber());

        return view('skl::quiz-question.index', compact('questionlist', 'searchKey', 'quizelist'));
    }


    public function quizFilter(Request $request)
    {
        $searchKey = null;
        $questionlist =  SKLQuizQuestion::with('quizzes')->where('quiz_id', $request->quiz_id);
        if ($request->search != null) {
            $tags = $questionlist->where('name', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }
        $questionlist = $questionlist->paginate(paginationNumber());
        //  dd($this->data);
        $returnHTML = view('skl::quiz-question.filter_quiz_response', compact('questionlist', 'searchKey'))->render();

        // dd($returnHTML);
        return response()->json(['success' => true, 'html' => $returnHTML]);
    }





    public function create()
    {

        $quizelist = SKLQuizze::all();

        return view('skl::quiz-question.create', compact('quizelist'));
    }

    public function store(Request $request)
    {

        $quizQuestion = new SKLQuizQuestion();
        $quizQuestion->quiz_id = $request->quize;
        $quizQuestion->question_text = $request->question_text;
        $quizQuestion->question_type = $request->question_type;
        $quizQuestion->save();


        if ($request->options) {
            foreach ($request->options as $options) {
                $isCorrect = isset($options['is_correct']) ? (bool) $options['is_correct'] : 0;
                $quizAnswer =    SKLQuestionOption::create([
                    'question_id' => $quizQuestion->id,
                    'option_text' => $options['option_text'],
                    'is_correct'  => $isCorrect,
                ]);
            }
        }


        $questionDetails = SKLQuestionOption::where('question_id', $quizAnswer->question_id)->where('is_correct', 1)->first();
      
      //  dd( $questionDetails);
        if (!empty($questionDetails)) {
            SKLQuizHistory::create([
                'question_id' => $questionDetails->question_id,
                'quiz_id' => $request->quize,
                'answer_id' => $questionDetails->id

            ]);
        }

        flash(localize('Record has been submitted successfully.'))->success();
        return redirect()->route('admin.questions.index');
    }

    public function edit($id)
    {

        $quizquestion = SKLQuizQuestion::findOrFail($id);
        $questionoption = SKLQuestionOption::where('question_id', $id)->get();
        $quizelist = SKLQuizze::all();
        return view('skl::quiz-question.edit', compact('quizquestion', 'questionoption', 'quizelist'));
    }

    public function update(Request $request, $id)
    {


        $quiz = SKLQuizQuestion::find($id);
        $quiz->quiz_id = $request->quize;
        $quiz->question_text = $request->question_text;
        $quiz->question_type = $request->question_type;
        $quiz->update();


        if ($request->options) {
            foreach ($request->options as $options) {
                $isCorrect = isset($options['is_correct']) ? (bool) $options['is_correct'] : 0;

                $existingOption = SKLQuestionOption::where('question_id', $quiz->id)
                    ->where('id', $options['id'])
                    ->first();

                if ($existingOption) {
                    // Update existing option
                    $existingOption->update([
                        'option_text' => $options['option_text'],
                        'is_correct'  => $isCorrect,
                    ]);
                } else {
                    // Create new option
                    SKLQuestionOption::create([
                        'question_id' => $quiz->id,
                        'option_text' => $options['option_text'],
                        'is_correct'  => $isCorrect,
                    ]);
                }
            }
        }


        flash(localize('Record has been submitted successfully.'))->success();
        return redirect()->route('admin.questions.index');
    }

    public function delete($id)
    {

        SKLQuizQuestion::where('id', $id)->delete();

        SKLQuestionOption::where('question_id', $id)->delete();

        flash(localize('Record has been Deleted successfully.'))->success();
        return redirect()->route('admin.questions.index');
    }
}
