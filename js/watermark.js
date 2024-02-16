
$(function () {
   if (GLPI_WATERMARK_PLUGIN_DATA
      && (GLPI_WATERMARK_PLUGIN_DATA['configcanupdate']
         || GLPI_WATERMARK_PLUGIN_DATA['force_watermak'])) {
      $('body').append('<div id="watermark_tl" style="left: 0px; top: 110px; font-size: 36px; position: fixed; z-index: 999998; opacity: 0.3; transform-origin: right top; transform: rotate(-90deg); pointer-events: none;">' + GLPI_WATERMARK_PLUGIN_DATA['watermak'] + '</div>');
      $('#watermark_tl').css('left', -$('#watermark_tl').width());
      $('body').append('<div id="watermark_tr" style="right: 50px; top: 110px; font-size: 36px; position: fixed; z-index: 999998; opacity: 0.3; transform-origin: right top; transform: rotate(-90deg); pointer-events: none;">' + GLPI_WATERMARK_PLUGIN_DATA['watermak'] + '</div>');
      $('body').append('<div id="watermark_bl" style="left: 5px; bottom: 5px; font-size: 36px; position: fixed; z-index: 999998; opacity: 0.3; pointer-events: none;">' + GLPI_WATERMARK_PLUGIN_DATA['watermak'] + '</div>');
      $('body').append('<div id="watermark_br" style="right: 5px; bottom: 5px; font-size: 36px; position: fixed; z-index: 999998; opacity: 0.3; pointer-events: none;">' + GLPI_WATERMARK_PLUGIN_DATA['watermak'] + '</div>');
   }
});

