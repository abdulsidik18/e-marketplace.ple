(function ($){

  $.fn.pluginku = function( options ){
    var setting = $.extend({
      warna : '#fff',
      background : '#f00',
    }, options);

    return this.css({
      color: setting.warna,
      backgroundColor: setting.background,
      width: 200,
      height: 100,
      padding: 10
    })
  };

}(jQuery));