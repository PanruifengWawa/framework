define(['react', 'jquery', 'rx'], function(React, $, Rx) {
  require('./index.less');

  class SignInForm extends React.Component {
    _handleSubmit(e) {
      e.preventDefault();
    }

    render() {
      return (
        <form onSubmit={this._handleSubmit}>
          <div>
            <input className="form-control" type="email" name="email" placeholder="邮箱" required="" />
            <input className="form-control" type="password" name="password" placeholder="密码" required="" />
            <input className="form-control button_s" type="submit" value="登陆"/>
          </div>
        </form>
      );
    }
  }

  return SignInForm;
});