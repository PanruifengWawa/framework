'use strict';

/**
 * 顶部导航
 *
 * @module Navigation
 */

define(['react'], function(React) {
  // Require stylesheet
  require('./index.less');

  // React component
  class Navigation extends React.Component {
    render() {
      return (
        <nav className="navigation">
          <ul className="navigation-leftnav">
            <li className="navigation-item">
              <a href="#" className="navigation-link">首页</a>
            </li>
            <li className="navigation-item">
              <a href="#" className="navigation-link">我的问题</a>
            </li>
          </ul>

          <ul className="navigation-rightnav">
            <li className="navigation-item">
              <a href="#" className="navigation-link">登录</a>
            </li>
            <li className="navigation-item">
              <a href="#" className="navigation-link">注册</a>
            </li>
          </ul>
        </nav>
      )
    }
  }

  return Navigation;
});