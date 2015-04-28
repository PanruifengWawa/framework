define(['react', 'jquery'], function(React, $) {
  require('./index.less');

  class CommentList extends React.Component {
    _handleSubmit(e) {
      e.preventDefault();
    }

    render() {
      return (
        <div className="answers">
          <div className="row">
            <div className="col-md-1 answer-status">
              <a href="">
                <div className="answer-support">&#xe602;</div>
              </a>
              <div>+1</div>
              <a href="">
                <div className="answer-disagree">&#xe603;</div>
              </a>
            </div>
            <div className="col-md-11">
              <a href=""><img className="img-circle answer-img-circle" src="http://tp4.sinaimg.cn/2249721655/180/40038203987/0" width="26" height="26"/><span className="answer-a_name">24小时的L学妹</span></a>发表于4分钟前
              <div className="answer-content">
                此处是回复。
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