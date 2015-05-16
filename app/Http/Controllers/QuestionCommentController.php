<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
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

    public function show($question_id,$comment_id)
    {
        $comment = Comment::find($comment_id);

        $user = \Session::get('user');

        $comment_user = $results = DB::select('select * from comment_user where comment_id = ? and user_id = ?', [$comment_id,$user->id]);

        if(!empty($comment_user))
            $comment['voted'] = $comment_user[0]->voted;
        else $comment['voted'] = 0;

        return view('comments/show', ['comment' => $comment]);

    }


}
