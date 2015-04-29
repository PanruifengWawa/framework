define(['react', 'jquery', '../CommentList/'], 
  function(React, $, CommentList) {

  require('./index.less');

  class SessionMain extends React.Component {
    _handleSubmitComment(e) {
      e.preventDefault();
      var $form = $(React.findDOMNode(this.refs['comment-form']));
      $.post('/questions/' + this.props.question.id + '/comments', $form.serialize()).
        done(function(data) {
          location.reload();
        }).
        fail(function(err) {
          console.log(err);
        });
    }

    render() {
      return (
      <div>
        <div className="container">
          <div className="row">
            <div className="col-sm-9">
              <div className="card question-card">
                <div className="question-content">
                  {this.props.question.content}
                </div>
                <div className="question-bottom">
                  匿名用户 发表于 
                  <span className="createdtime">{this.props.question.user.updated_at}</span>
                  <a href="" className="question-react"><span className="share-img">&#xe604;</span>分享</a>
                  <a href="" className="question-react"><span className="answer-img">&#xe600;</span>回答</a>
                </div>
              </div>

              <div className="card statistics">
                <p>用过这道题的公司</p>
                <div className="usingcompany">
                  <a href="">
                    <img className="company_pic" src="http://placehold.it/44x44" alt={this.props.question.companies[0].name}/>
                    <p>{this.props.question.companies[0].name}</p>
                  </a>
                </div>
              </div>

              <div className="card answer-list">
                <p>{this.props.question.comments.length}个回答</p>
                {this.props.question.comments.map(function(comment) {
                  return <CommentList key={comment.id} comment={comment}/>
                })}
              </div>

              <div className="card youranswer">
                <p>回答</p>
                <form ref="comment-form" onSubmit={this._handleSubmitComment.bind(this)}>
                  <div className="form-group">
                    <textarea type="text" className="form-control" id="content" name="content" placeholder="你有什么见解？"></textarea>
                  </div>
                  <input type="submit" className="button" value="提交"></input>
                </form>
              </div>
            </div>

            <div className="col-sm-3">
              <div className="sidebar">
                <p>预留模块</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      );
    }
  }

  return SessionMain;
});