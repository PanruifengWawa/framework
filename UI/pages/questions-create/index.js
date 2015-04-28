require('base');

require(['components', 'react', './QuestionCreateForm'], 
  function(components, React, QuestionCreateForm) {

  React.render(<div className="container">
      <div className="row">
        <div className="col-sm-5 col-sm-offset-2">
          <QuestionCreateForm />
        </div>
        <div className="col-sm-3">haha</div>
      </div>
    </div>,
    document.getElementById('J_questions-create'));

});