<?php namespace App\Http\Controllers;


use App\Comment;
use App\Company;
use App\Question;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use \Illuminate\Support\Facades\DB;
use App\User;
use App\Position;


class QuestionController extends Controller {

    public function store(){
        $company = new Company();
        $company_name = \Request::input('company_name');
        if(!$company_name)return $this->reportJSONError("公司名称不能为空");
        try {
            $company = Company::where('name', '=', $company_name)->firstOrFail();
        } catch (ModelNotFoundException $e){
            return $this->reportJSONError("该公司记录不存在");
        }
        $position = new Position();
        $position_title = \Request::input('position_title');
        if(!$position_title)return $this->reportJSONError("职位名称不能为空");

        try {
            $position = Position::where('title', '=', $position_title)->firstOrFail();
        }catch (ModelNotFoundException $e){
            return $this->reportJSONError("该职位记录不存在");
        }


        $user = \Session::get('user');

        $questionContents = \Request::input('questions');
        
        if ( !$questionContents || count($questionContents) === 0)
            return $this->reportJSONError("问题不能为空");

        $count_questions = count($questionContents);
        $questions = new \Illuminate\Database\Eloquent\Collection;
        for($i = 0; $i < $count_questions; $i++)
        {
            $questions[$i] = new Question();
            $questions[$i]->content = $questionContents[$i];
            $questions[$i]->user_id = $user->id;
            $questions[$i]->save();
            $questions[$i]->companies()->attach($company->id);
            $questions[$i]->positions()->attach($position->id);

        }
        return $this->responseJSON($questions->toJson());
    }




    public function show($questionId) {
        $question = Question::with([])
            ->with([
                'companies', 
                'user', 
                'comments' => function($q) {
                    return $q->orderBy('created_at', 'desc');
                },
                'comments.user'])
            ->findOrFail($questionId);
        return view('questions/show', ['question' => $question]);

    }



    public function create() {
        return view('questions/create');
    }

}