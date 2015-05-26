define(['react', 'jquery'], function(React, $) {
  class Vote extends React.Component {
    constructor(props) {
      super(props);
      this.state = {
        loading: false,
        score: props.comment.up_voted_amount - props.comment.down_voted_amount,
        voted: props.comment.voted
      };
    }

    handleUpVote(e) {
      e.preventDefault();
      if (this.state.voted !== 0) {
        return alert('您已经投过票了');
      }
      var that = this;
      this.setState({
        loading: true
      });
      $.ajax({
        type: 'POST',
        url: `/questions/${this.props.question.id}/comments/${this.props.comment.id}/vote`,
        data: { vote: 1 },
        success: function(data) {
          that.setState({
            loading: false,
            score: data.up_voted_amount - data.down_voted_amount,
            voted: 1
          });
        }
      })
    }

    handleDownVote(e) {
      e.preventDefault();
      if (this.state.voted !== 0) {
        return alert('您已经投过票了');
      }
      var that = this;
      this.setState({
        loading: true
      });
      $.ajax({
        type: 'POST',
        url: `/questions/${this.props.question.id}/comments/${this.props.comment.id}/vote`,
        data: { vote: -1 },
        success: function(data) {
          that.setState({
            loading: false,
            score: data.up_voted_amount - data.down_voted_amount,
            voted: -1
          });
        }
      })
    }

    render() {
      var inner;

      if (!this.state.loading) {
        inner = this.state.score;
      }
      else {
        inner = <span className="loading"></span>;
      }

      return (
        <div className="col-md-1 answer-status">
          <a href="" className="answer-action">
            <div className="answer-support" onClick={this.handleUpVote.bind(this)}>&#xe602;</div>
          </a>
          <div className="answer-inner">
            {inner}
          </div>
          <a href="" className="answer-action">
            <div className="answer-disagree" onClick={this.handleDownVote.bind(this)}>&#xe603;</div>
          </a>
        </div>
      );
    }
  }

  return Vote;
});