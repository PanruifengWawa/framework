define(['react', 'jquery', 'components'], function(React, $, components) {
  require('./index.less');
  var {
    Typeahead
  } = components;

  class QuestionCreateForm extends React.Component {
    constructor(props) {
      super(props);
      this.state = {
        questions: [''],
        position_title: '',
        company_name: ''
      };
    }

    _handleAddNewQuestion(e) {
      e.preventDefault();
      this.state.questions.push('');
      this.forceUpdate();
      setTimeout(function() {
        window.scrollTo(0, document.body.scrollHeight)
      }, 0);
    }

    _handleSubmit(e) {
      e.preventDefault();
      var $form = $(React.findDOMNode(this.refs['form']));
      $.post('/questions', $form.serialize()).
        done(function(data) {
          location.pathname = '/questions/my';
        }).
        fail(function(err) {
          console.log(err);
        });
    }

    render() {
      return (<div className="questionCreateForm">
        <form ref="form" onSubmit={this._handleSubmit.bind(this)}>
          <div className="row">
            <div className="form-group col-sm-12">
              <label htmlFor="questions">问题详情</label>
              {this.state.questions.map(function(question, idx) {
                return <textarea className="questionCreateForm-question form-control" 
                                key={idx}
                                rows="4"
                                placeholder="在此输入面试问题的内容"
                                name={'questions[' + idx + ']'}></textarea>
              })}
            </div>
          </div>
          <div className="row">
            <div className="form-group col-sm-6">
              <label htmlFor="company_name">公司</label>
              <Typeahead className="form-control" name="company_name" 
                placeholder="公司名称"
                urlBase="/companies"
                nameField="name"/>
            </div>
            <div className="form-group col-sm-6">
              <label htmlFor="position_title">职位</label>
              <Typeahead className="form-control" name="position_title" 
                placeholder="职位名称"
                urlBase="/positions"
                nameField="title"/>
            </div>
          </div>
          <div className="row">
            <div className="form-group col-sm-4">
              <input type="submit" className="button button-block" value="提交"></input>
            </div>
            <div className="form-group col-sm-4">
              <a className="button button-block" onClick={this._handleAddNewQuestion.bind(this)}>增加问题</a>
            </div>
          </div>
        </form>
      </div>);
    }
  }

  return QuestionCreateForm;
});