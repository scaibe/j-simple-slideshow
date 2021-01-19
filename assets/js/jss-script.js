(function($){

  $(document).ready(function(){
    var slider = tns({
      mode: 'gallery',
      container: '.jss-slider',
      items: 1,
      controlsContainer: "#customize-controls",
      navPosition: "bottom",
      autoplayButton: false,
      autoplayButtonOutput: false,
      autoplay: true
    });
  });

})(jQuery);
