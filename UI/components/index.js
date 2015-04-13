define(['./Header', 
    './Navigation',
    './Cardflow',
    './CardPanel'], 
  function(Header, Navigation, Cardflow, CardPanel) {
    return {
      Header: Header,
      Navigation: Navigation,
      Cardflow: Cardflow,
      CardPanel: CardPanel
    };
});