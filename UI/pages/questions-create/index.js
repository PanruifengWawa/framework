require('base');

require(['components', 'react'], 
  function(components, React) {

  React.render(<div>This is a question creating page.</div>,
    document.getElementById('J_questions-create'));

});