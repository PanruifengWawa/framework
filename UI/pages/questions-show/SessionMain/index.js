define(['react', 'jquery', 'rx', '../CommentList/'], 
  function(React, $, Rx, CommentList) {

  require('./index.less');

  class SessionMain extends React.Component {
    _handleSubmit(e) {
      e.preventDefault();
    }

    render() {
      return (
      <div>
        <div className="container">
          <div className="row">
            <div className="col-sm-9">
              <div className="card question-card">
                <div className="question-content">
                  Angular.js当中，编译一个指令发生在什么阶段？Angular.js当中，编译一个指令发生在什么阶段？Angular.js当中，编译一个指令发生在什么阶段？
                </div>
                <div className="question-bottom">
                  匿名用户 发表于4分钟前
                  <a href="" className="question-react"><span className="share-img">&#xe604;</span>分享</a>
                  <a href="" className="question-react"><span className="answer-img">&#xe600;</span>回答</a>
                </div>
              </div>

              <div className="card statistics">
                <p>用过这道题的公司</p>
                <div className="usingcompany">
                  <a href="">
                    <img className="company_pic" src="http://placehold.it/44x44" alt="网易"/>
                    <p>网易</p>
                  </a>
                </div>
              </div>

              <div className="card answer-list">
                <p>24个回答</p>
                <CommentList />
              </div>

              <div className="card youranswer">
                <p>回答</p>
                <div className="form-group">
                  <textarea type="text" className="form-control" id="myanswer" placeholder="你有什么见解？"></textarea>
                </div>
                <button className="answer-submit">提交</button>
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