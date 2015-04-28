<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Comment;
use App\Question;

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


}
