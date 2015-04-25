<?php namespace App\Http\Controllers;


use App\Comment;
use App\Company;
use App\Question;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use \Illuminate\Support\Facades\DB;
use App\User;

class QuestionController extends Controller {

    public function show($questionId){
        if (!\Request::isMethod('get')) {
            return $this->reportError("非法请求");

        }


        $question = $this->getQuestion($questionId);
        if($question==null) return $this->reportError("问题不存在");

        $userCreatingQuestion = $this->getUser($question->user_id);

        $companiesUsingQuestion = $this->getCompanies($questionId);

        $comments = $this->getComments($questionId);



        return \Response::json(['question'=>$question,'userCreatingQuestion'=>$userCreatingQuestion,'companiesUsingQuestion'=>$companiesUsingQuestion,'comments'=>$comments]);


    }

    private function getComments($questionId){
        try {
            $comments = Comment::where('question_id', '=',  $questionId)->get();
            foreach($comments as $c){
                $c["user"] = $this->getUser($c->user_id);
            }
            return $comments;

        } catch (ModelNotFoundException $e) {
        }
        return null;
    }

    private function getUser($userId){
        try {
            $user = User::where('id', '=',  $userId)->firstOrFail();
            return $user;

        } catch (ModelNotFoundException $e) {
        }
        return null;
    }

    private function getCompanies($questionId){
        $questionCompany = DB::select('select * from question_company where question_id = ?', [$questionId]);
        if( $questionCompany == null) return null;
        $i = 0;
        foreach($questionCompany as $qc){
            try {
                $company = Company::where('id', '=',  $qc->company_id)->firstOrFail();
                $results[$i] = $company;
                $i++;

            } catch (ModelNotFoundException $e) {
            }
        }
        return $results;
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
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/30
 * Time: 15:43
 */