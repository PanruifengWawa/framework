define(['react', './Dropdown', 'jquery'], function(React, Dropdown, $) {
  require("./index.less");

  class Typeahead extends React.Component {
    constructor() {
      this.state = {
        text: '',
        opened: false,
        list: []
      };
    }

    componentDidMount() {
      var that = this;
      $.ajax(this.props.urlBase).
        done(function(data) {
          that.setState({
            list: data
          });
        });
    }

    _handleFocus() {
      this.setState({
        opened: true
      });
    }

    _handleBlur() {
      var that = this;
      setTimeout(function() {
        that.setState({
          opened: false
        });
      }, 300);
    }

    _handleChoose(name) {
      this.setState({
        text: name
      });
      if (this.props.onChoose) {
        this.props.onChoose(name);
      }
    }

    _handleChange(event) {
      this.setState({
        value: event.target.value
      });

    }

    componentDidUpdate(prevProps, prevState) {

    }

    render() {
      return (<div className="typeahead">
        <input type="text" name={this.props.name} 
          className={this.props.className}
          placeholder={this.props.placeholder||''} 
          onFocus={this._handleFocus.bind(this)}
          onBlur={this._handleBlur.bind(this)}
          value={this.state.text} onChange={this._handleChange.bind(this)}/>
        <Dropdown list={this.state.list} 
          opened={this.state.opened} 
          onChoose={this._handleChoose.bind(this)}
          nameField={this.props.nameField}/>
      </div>)
    }
  }


  return Typeahead;
});