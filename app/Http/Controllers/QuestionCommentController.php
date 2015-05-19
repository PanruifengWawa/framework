<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Comment;
use App\Question;
use App\User;

class QuestionCommentController extends Controller {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($question_id)
	{
		$content = \Request::input('content', null);
		if (!$content) {
			return $this->reportJSONError('评论不能为空');
		}
		$question = Question::find($question_id);
		$user = \Session::get('user');
		$comment = new Comment(array(
			'content' => $content
		));
		$comment->user_id = $user->id;
		$comment->question_id = $question->id;
		$comment->save();
		return $this->responseJSON($comment->toJSON(), 201);
	}


    public function vote($question_id, $comment_id){
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
            $comment->up_voted_amount ++;
        }
        else if($vote == -1){
            $comment->down_voted_amount ++;
        }
        $comment->save();

        $user->comments()->attach($comment_id, ['voted' => $vote]);
        return $this->responseJSON($comment->toJson());
    }


}
