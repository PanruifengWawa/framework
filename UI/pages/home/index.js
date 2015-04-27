require('base');

require(['react', './MainPage'], function(React, MainPage) {
  require('./index.less');

  React.render(<MainPage 
      user={window.iu.user} 
      questions={window.iu.data.questions}/>, 
    document.getElementById('J_index'));

});