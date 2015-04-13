/**
 * 卡片基础页
 * 
 * @module CardPanel
 */


define(['react'], function(React) {
  // Require stylesheet
  require('./index.less');

  // React component
  class CardPanel extends React.Component {
    render() {
      return (
        <p>Work!</p>
      );
    }
  }

  return CardPanel;
});