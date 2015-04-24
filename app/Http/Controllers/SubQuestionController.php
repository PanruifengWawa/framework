<?php


namespace App\Http\Controllers;

use App\Admin;
use App\Comment;
use App\Company;
use App\Question;
use App\User;
use App\Position;

class SubQuestionController extends Controller{
    public function create(){

        $company_name = \Request::input('company_name');
        $company = Company::where('name' , '==', $company_name);

        $position_name = \Request::input('position_name');
        $position = Position::where('title', '==', $position_name);

        $user_id = \Request::input('user_id');
        $user = User::find($user_id);

        $questions = \Request::input('questions');
        $question = new Question();
        $de_questions = json_decode($questions);
        $count_ques = count($de_questions);

        for($i = 0; $i < $count_ques; $i++)  
        {
            $question->content = $de_questions[$i]['content'];

            $question->save();
            $user->question()->associate($question);
            $question->companies()->attach($company->id);
            $question->positions()->attach($position->id);
        }
    }

    private function reportError($st) {
        return \Response::json(['error' => $st],400);
    }
}