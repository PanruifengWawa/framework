/**
 * 用户登录首页
 * 
 * @module Index
 */


define(['react', 'components'], function(React, components) {
  // Require stylesheet

  // React component
  var {
    Cardflow,
    Pagination 
  } = components;

  class MainPage extends React.Component {
    render() {
      return (
        <div className="container">
          <div className="row">
            <div><Cardflow questions={this.props.questions.data}/></div>
          </div>
          <Pagination totalPages={this.props.questions.last_page}
            currentPage={this.props.questions.current_page}/>
        </div>
      );
    }
  }

  return MainPage;
});