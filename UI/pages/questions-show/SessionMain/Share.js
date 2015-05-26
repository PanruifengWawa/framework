define(['react', 'jquery'], 
  function(React, $) {

  class Share extends React.Component {
    constructor() {
      this.state = {
        opened: false
      };
    }

    componentDidMount() {
    }

    handleClick(e) {
      e.preventDefault();
      var jiathisScript = document.querySelector('#jiathis-script');
      if (this.state.opened) {
        this.setState({
          opened: false
        });
      }
      else {
        this.setState({
          opened: true
        });
      }
    }

    render() {
      var share
      if (this.state.opened) {
        share = (<div className="jiathis_style_24x24 question-share">
          <a className="jiathis_button_qzone"></a>
          <a className="jiathis_button_tsina"></a>
          <a className="jiathis_button_tqq"></a>
          <a className="jiathis_button_weixin"></a>
          <a className="jiathis_button_renren"></a>
          <a href="http://www.jiathis.com/share?uid=1928044" className="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
          <a className="jiathis_counter_style"></a>
        </div>)
      }
      else {
        share = (<div className="jiathis_style_24x24 question-share" style={{visibility: "hidden"}}>
          <a className="jiathis_button_qzone"></a>
          <a className="jiathis_button_tsina"></a>
          <a className="jiathis_button_tqq"></a>
          <a className="jiathis_button_weixin"></a>
          <a className="jiathis_button_renren"></a>
          <a href="http://www.jiathis.com/share?uid=1928044" className="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
          <a className="jiathis_counter_style"></a>
        </div>)
      }
      return(<span className="question-react">
        <a href="" onClick={this.handleClick.bind(this)}><span className="share-img">&#xe604;</span>分享</a>
        {share}
      </span>);
    }
  }

  return Share;
});