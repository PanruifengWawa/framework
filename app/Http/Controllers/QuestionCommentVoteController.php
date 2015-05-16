<?php
/**
 * Created by PhpStorm.
 * User: 1Sh1ne
 * Date: 2015/5/16
 * Time: 14:36
 */

namespace App\Http\Controllers;
use App\Admin;
use App\Comment;
use App\Company;
use App\Question;
use App\User;
use App\Position;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class QuestionCommentVoteController extends Controller{
    public function store($comment_id){
        $user = new User();
        $user = \Session::get('user');
        $comment = new Comment();
        try {
            $comment = Comment::find($comment_id);
        }catch (ModelNotFoundException $e){
            return $this->reportJSONError("该评论不存在");
        }

        $vote = \Request::get('vote');
        if($vote == 1){
            $comment->up_vote_amount ++;
        }
        else if($vote == -1){
            $comment->down_vote_amount ++;
        }
        $comment->save();

        $user->comment()->attach($comment_id, ['voted' => $vote]);
        return $this->responseJSON($comment->toJson());

    }

}