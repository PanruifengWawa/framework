define(['react', 'jquery'], function(React, $) {
  require('./index.less');
  var Vote = require('./Vote');

  class CommentList extends React.Component {
    _handleSubmit(e) {
      e.preventDefault();
    }

    render() {
      return (
        <div className="answers">
          <div className="row">
            <Vote {...this.props}/>
            <div className="col-md-11">
              <a href=""><img className="img-circle answer-img-circle" src={this.props.comment.user.avatar} width="26" height="26"/><span className="answer-a_name">{this.props.comment.user.name}</span></a>发表于 {this.props.comment.updated_at}
              <div className="answer-content">
                {this.props.comment.content}
              </div>
              <a href="" className="answer-share-link"><span className="share-img">&#xe604;</span>分享</a>
            </div>
          </div>
        </div>
      );
    }
  }

  return CommentList;
});