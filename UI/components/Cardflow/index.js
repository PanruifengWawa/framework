/**
 * 用户登录首页
 * 
 * @module Index
 */


define(['react', '../CardPanel', '../Pagination'], function(React, CardPanel, Pagination) {
  // Require stylesheet
  require('./index.less');

  // React component
  class Cardflow extends React.Component {
    render() {
      var questions = this.props.questions,
        leftColQuestions = [], leftColTextCount = 0,
        rightColQuestions = [], rightColTextCount = 0;
      questions.forEach(function(question) {
        if (leftColTextCount < rightColTextCount) {
          leftColQuestions.push(question);
          leftColTextCount += question.content.length;
        }
        else {
          rightColQuestions.push(question);
          rightColTextCount += question.content.length;
        }
      });

      // show selfcard?
      var selfcard;
      if (this.props.showProfile) {
        selfcard = (
            <section className="selfcard">
              <div className="selfcard-head">
                <header className="clearfix">
                  <a href="#" className="selfcard-head-pic">
                    <img className="img-circle" src={window.iu.user.avatar} width="52" height="52"/>
                  </a>
                  <div className="selfcard-head-words">
                    <p className="selfname"><strong><a href="#/profile">{window.iu.user.name}</a></strong></p>
                    <p className="selfdescription">这是待添加的描述字段</p> 
                  </div>
                </header>
              </div>  
              <div className="selfcard-body">
                <header className="clearfix">
                  <div className="a_numtext">
                    <a href="#/my" >
                      <div className="numtext">
                        <p className="num_numtext">0</p>
                        <p className="text_numtext">回答</p>
                      </div>     
                    </a>
                    <a href="#/my" className="a_numtext">
                      <div className="numtext">
                        <p className="num_numtext">0</p>
                        <p className="text_numtext">问题</p>
                      </div>     
                    </a>
                  </div>
                </header>
              </div>
            </section>
        );
      }
      else {
        selfcard = '';
      }

      return (
        <div className="row cardflow">
          <div className="col-md-1"></div>
          <div className="col-md-5 col-md-push-5">
            
            {selfcard}
            {leftColQuestions.map(function(question) {
              return <CardPanel key={question.id} question={question}/>
            })}
          </div>
          <div className="col-md-5 col-md-pull-5">
            {rightColQuestions.map(function(question) {
              return <CardPanel key={question.id} question={question}/>
            })}
          </div>
          <div className="col-md-1"></div>
        </div>
      );
    }
  }

  return Cardflow;
});