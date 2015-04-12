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
      return <nav class="navigation">Hi nav</nav>
    }
  }

  return Navigation;
});