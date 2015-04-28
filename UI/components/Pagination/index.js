/**
 * 翻页
 * 
 * @module Pagination
 */


define(['react'], function(React) {
  // Require stylesheet
  require('./index.less');

  // React component
  class Pagination extends React.Component {
    render() {
      var pageLIs = [], i;
      for (i = 1; i <= this.props.totalPages; i ++) {
        if (i === this.props.currentPage) {
          pageLIs.push(<li><a className="active" href={"/?page="+i}>{i}</a></li>);
        }
        else {
          pageLIs.push(<li><a href={"/?page="+i}>{i}</a></li>);
        }
      }

      return (
        <div className="pagination">
        <nav>
          <ul className="pagination-row">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            {pageLIs}
            <li>
              <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
        </div>
      );
    }
  }

  Pagination.propTypes = {
    currentPage: React.PropTypes.number,
    totalPages: React.PropTypes.number
  };

  return Pagination;
});