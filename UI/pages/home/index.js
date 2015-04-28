require('base');

require(['react', './MainPage'], function(React, MainPage) {
  require('./index.less');

  React.render(<MainPage 
      user={window.iu.user} 
      questions={window.iu.data.questions}
      showProfile={window.iu.data.showProfile}/>, 
    document.getElementById('J_index'));

});