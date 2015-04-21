require('base');

require(['components', 'react', './SignInForm'], 
  function(components, React, SignInForm) {

  React.render(<SignInForm />,
    document.getElementById('J_sign-in-form'));

});