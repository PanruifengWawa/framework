/**
 * 用户登录首页
 * 
 * @module Index
 */


define(['react', '../Cardflow', '../Pagination'], function(React, Cardflow, Pagination) {
  // Require stylesheet

  // React component
  class Index extends React.Component {
    render() {
      return (
        <div className="container">
          <div className="row">
            <div className="col-md-2"></div>
            <Cardflow />
          </div>
          <div className="row">
            <Pagination />
          </div>
        </div>
      );
    }
  }

  return Index;
});