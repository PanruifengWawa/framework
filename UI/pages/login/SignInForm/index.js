define(['react', 'jquery'], function(React, $) {
  class SignInForm extends React.Component {
    _handleSubmit(e) {
      e.preventDefault();
      // TODO Login
    }

    render() {
      console.log($);
      return (
        <form onSubmit={this._handleSubmit}>
          <div className="form-control">
            <label htmlFor="email">Email</label>
            <input type="text" name="email" />
          </div>
          <div className="form-control">
            <label htmlFor="email">Password</label>
            <input type="password" name="password" />
          </div>
          <div className="form-control">
            <input type="submit" value="login"/>
          </div>
        </form>
      );
    }
  }

  return SignInForm;
});