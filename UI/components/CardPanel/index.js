/**
 * 卡片基础页
 * 
 * @module CardPanel
 */


define(['react'], function(React) {
  // Require stylesheet
  require('./index.less');

  // React component
  class CardPanel extends React.Component {
    render() {
      var question = this.props.question;

      return (
        <section className="card-panel">
          <div className="card-panel-body">
            <div className="card-panel-head">
                <a className="card-panel-companyname" href={"/questions/"+question.id}>{question.companies[0].name}</a>
              <span className="card-panel-recorded">
                <span className="glyphicon glyphicon-time" aria-hidden="true"> </span><span> 4分钟前</span>
              </span>
            </div>
            
            <div className="card-panel-content">
              <p className="card-panel-content-p">{question.content}</p>
            </div>
            
            <div className="card-panel-bottom">
              <span className="card-panel-num-answers">
                <a href={"/questions/"+question.id}>{question.comments.length}条回答</a>
              </span>
              <span className="card-panel-num-asked">
                <a href={"/questions/"+question.id}>49人面过</a> 
              </span>
            </div>
          </div>
        </section>
      );
    }
  }

  return CardPanel;
});