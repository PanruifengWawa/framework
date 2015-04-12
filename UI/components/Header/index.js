/**
 * 全局顶通
 * 
 * @module Header
 */

define(['react'], function(React) {
  // Require stylesheet
  require('./index.less');

  // React component
  class Header extends React.Component {
    render() {
      return (
        <header className="header container J_header">
          <div className="row">
            <div className="col-sm-2">
              <a href="/" className="header-logo">InterU</a>
            </div>
          </div>
        </header>
      );
    }
  }

  return Header;
});