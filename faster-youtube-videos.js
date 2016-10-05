(function ($) {
  "use strict";

  $.fn.embedyt = function (youid) {
    
    var htm = '<img class="img-responsive" src="http://img.youtube.com/vi/' + youid + '/0.jpg" /><input style="cursor:pointer;" class="fyv-play" type="button" value=" play " />';
    this.html(htm);

    this.find(".fyv-play").bind('click', function () {
      var ifhtml = '<div class="video-container"><iframe src="http://www.youtube.com/embed/' + youid + '?autoplay=1" frameborder="0" allowfullscreen></iframe></div>';
      jQuery(this).css("cursor", "progress");
      jQuery(this).parent().html(ifhtml);
    });

  };


}(window.jQuery||window.$));

jQuery(function () {

  jQuery(".fyv-img-wrap").each(function (index) {
    var youID = jQuery(this).data( 'ytid' );
    jQuery(this).embedyt(youID);
  });

});