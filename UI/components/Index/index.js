/**
 * 用户登录首页
 * 
 * @module Index
 */


define(['react', '../Card-flow', '../Pagination'], function(React, Navigation) {
  // Require stylesheet
  require('./index.less');

  // React component
  class Index extends React.Component {
    render() {
      return (
        <div className="container">
          <div className="row">
            <div className="col-md-2"></div>
              <Card-flow />
            </div>
            <div className="row">
              <Pagination />
            </div>
          </div>
        </div>
      );
    }
  }

  return Index;
});