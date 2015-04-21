require(['components', 'react', './SignInForm', 'base'], 
  function(components, React, SignInForm) {

  React.render(<SignInForm />,
    document.getElementById('J_sign-in-form'));

});