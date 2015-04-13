/**
 * 全局顶通
 * 
 * @module Header
 */


define(['react', 'components/Navigation'], function(React, Navigation) {
  // Require stylesheet
  require('./index.less');

  // React component
  class Header extends React.Component {
    render() {
      return (
        <header className="header">
          <div className="container">
            <div className="row">
              <div className="col-sm-2">
                <a href="/" className="header-logo">InterU</a>
              </div>
              <div className="col-sm-8">
                <Navigation />
              </div>
            </div>
          </div>
        </header>
      );
    }
  }

  return Header;
});