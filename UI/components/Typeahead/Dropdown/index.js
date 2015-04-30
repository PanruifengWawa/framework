define(['react', 'jquery'], function(React, $) {
  require('./index.less');

  class Dropdown extends React.Component {
    _handleChoose(e) {
      var name = $(e.nativeEvent.target).attr('data-name');
      if (this.props.onChoose) {
        this.props.onChoose(name);
      }
    }

    render() {
      var that = this;

      var innerList = (<ul className="dropdown-list">
        <li className="dropdown-item">Loading positions</li>
      </ul>);
      if (this.props.list.length > 0) {
        innerList = <ul className="dropdown-list">
          {this.props.list.map(function(item) {
            return <li
              className="dropdown-item"
              key={item.id}
              data-name={item[that.props.nameField]} 
              onClick={that._handleChoose.bind(that)}>{item[that.props.nameField]}</li>
          })}
        </ul>
      }

      return (<div className={"dropdown " + (this.props.opened?"dropdown-opened":"")}>
        {innerList}
      </div>)
    }
  }
  return Dropdown;
});