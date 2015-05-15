define(['./Header', 
    './Navigation',
    './Cardflow',
    './CardPanel',
    './Pagination',
    './Typeahead'], 
  function(Header, 
    Navigation, 
    Cardflow, 
    CardPanel, 
    Pagination,
    Typeahead) {
    return {
      Header: Header,
      Navigation: Navigation,
      Cardflow: Cardflow,
      CardPanel: CardPanel,
      Pagination: Pagination,
      Typeahead: Typeahead
    };
});