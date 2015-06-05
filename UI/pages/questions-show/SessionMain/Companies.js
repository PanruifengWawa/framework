define(['react', 'jquery', 'components'],
  function(React, $, components) {
    require('./companies.less');
    var {
      Typeahead
    } = components;

    class Companies extends React.Component {
      constructor() {
        this.state = {
          typeAhead: false,
          companies: []
        };
      }

      handleToggleAdd() {
        if (this.state.typeAhead) {
          this.setState({
            typeAhead: false
          });
        }
        else {
          this.setState({
            typeAhead: true
          });
        }
      }

      handleAdd(name) {
        var companies = this.state.companies.slice(0);
        companies.push(name);
        this.setState({
          companies: companies,
          typeAhead: false
        });
      }

      render() {
        var typeAhead = '';
        if (this.state.typeAhead) {
          typeAhead = (
            <div className="companies-typeahead" style={{position:'absolute'}}>
            <Typeahead className="form-control" name="company_name" 
                  placeholder="公司名称"
                  urlBase="/companies"
                  nameField="name"
                  onChoose={this.handleAdd.bind(this)}/>
            </div>);
        }
        return (<div className="companies clearfix">
          <a href="" className="companies-item">
            <img className="companies-pic" src="http://placehold.it/44x44" alt={this.props.question.companies[0].name}/>
            <p>{this.props.question.companies[0].name}</p>
          </a>
          {this.state.companies.map(function(company) {
            return (<a href="" key={company} className="companies-item">
              <img className="companies-pic" src="http://placehold.it/44x44" alt={company}/>
              <p>{company}</p>
            </a>);
          })}
          <span className="companies-add companies-item">
            <span onClick={this.handleToggleAdd.bind(this)}>+</span>
            {typeAhead}
          </span>
        </div>);
      }
    }

    return Companies;
});