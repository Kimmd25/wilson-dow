$(document).ready(function() {


  (function($) {

    // tabs
    var tabs = $(".objections");

    // indexing the tabs
    tabs.each(function(index) {
      console.log(index, $(this));
    });

    // active / inactive
    tabs.click(function() {
      var active = $(this).attr('data-tab');
      if (!$(this).hasClass('active_nav')) {
        $(this).addClass('active_nav');
        $('.active_nav').not($(this)).removeClass('active_nav');
        $('.active_tab').removeClass('active_tab');
        $('#' + active).addClass('active_tab');
      }
    });

  })(jQuery);


});
