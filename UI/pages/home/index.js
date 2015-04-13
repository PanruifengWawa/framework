require(['components', 'react', 'base'], function(components, React) {
  
  // TODO: delete this object
  window.iu.user = {
    username: 'John Wu',
    avatar: 'http://placehold.it/100x100',
    description: '神奇不神奇',
    answered: 27,
    asked: 36
  };

  React.render(<components.Index user={window.iu.user}/>, document.getElementById('J_index'));

});