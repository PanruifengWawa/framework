<?php namespace App\Http\Controllers;


use App\Comment;
use App\Company;
use App\Question;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use \Illuminate\Support\Facades\DB;
use App\User;

class QuestionController extends Controller {

    public function store(){
        $company = new Company();
        $company_name = \Request::input('company_name');
        if(!$company_name)return $this->reportError("公司名称不能为空");
        try {
            $company = Company::where('name', '=', $company_name)->firstOrFail();
        }catch (ModelNotFoundException $e){
            return $this->reportError("公司不存在");
        }
        $position = new Position();
        $position_name = \Request::input('position_name');
        if(!$position_name)return $this->reportError("职位名称不能为空");
        try {
            $position = Position::where('title', '=', $position_name)->firstOrFail();
        }catch (ModelNotFoundException $e){
            return $this->reportError("职位不存在");
        }
        $user = new User();
        $user_id = \Request::input('user_id');
        if(!$user_id)return $this->reportError("用户名不能为空");
        try {
            $user = User::find($user_id)->firstOrFail();
        } catch(ModelNotFoundException $e){
            return $this->reportError("用户不存在");
        }
        $questions = \Request::input('questions');
        if(!$questions)return $this->reportError("问题不能为空");
        $de_questions = json_decode($questions);
        $count_ques = count($de_questions);
        $question_ids = array();
        for($i = 0; $i < $count_ques; $i++)
        {
            $question = new Question();
            $question->content = $de_questions[$i];
            $question->user_id = $user_id;
            $question->save();
            array_push($question_ids, $question->id);
            $question->companies()->attach($company->id);
            $question->positions()->attach($position->id);
        }
        return \Response::make(json_encode($question_ids), 200);
    }

    public function show($questionId){
        if (!\Request::isMethod('get')) {
            return $this->reportError("非法请求");
        }


        $question = $this->getQuestion($questionId);
        if($question==null) return $this->reportError("问题不存在");

        $userCreatingQuestion = $this->getUser($question);

        $companiesUsingQuestion = $this->getCompanies($question);

        $comments = $this->getComments($question);
/*
        return view('questions/show',['question'=>$question,
            'userCreatingQuestion'=>$userCreatingQuestion,
            'companiesUsingQuestion'=>$companiesUsingQuestion,
            'comments'=>$comments]);*/
        return \Response::json(['question'=>$question,'userCreatingQuestion'=>$userCreatingQuestion,'companiesUsingQuestion'=>$companiesUsingQuestion,'comments'=>$comments]);


    }

    private function getComments($question){
        $comments = $question->comments;
        return $comments;
    }

    private function getUser($question){
        $user = $question -> user;
        return $user;
    }

    private function getCompanies($question){
        $questionCompanny = $question->companies;
        return $questionCompanny;
    }

    private function getQuestion($questionId){
        try {
            $question = Question::where('id', '=',  $questionId)->firstOrFail();
            return $question;
        } catch (ModelNotFoundException $e) {
        }
        return null;
    }
    private function reportError($st) {
        $response =  \Response::json(['error' => $st],400);
        return $response;
    }
}