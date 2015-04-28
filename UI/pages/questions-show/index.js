require('base');

require(['components', 'react', './SessionMain'], 
  function(components, React, SessionMain) {

  React.render(<SessionMain question={window.iu.data.question}/>,
    document.getElementById('J_questions-show'));

});