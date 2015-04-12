/**
 * Require base CSS
 */
require('./index.less');

/**
 * Render base modules that every page shares
 */
require(['components', 'react'], function(components, React) {
  var Header = components.Header;
  React.render(<Header />, document.getElementById('header'));
});