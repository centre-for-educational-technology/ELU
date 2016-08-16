jQuery(document).ready(function($) {

  $('#project_start').datetimepicker();
  $('#project_end').datetimepicker({
    useCurrent: false //Important! See issue #1075
  });
  $("#project_start").on("dp.change", function (e) {
    $('#project_end').data("DateTimePicker").minDate(e.date);
  });
  $("#project_end").on("dp.change", function (e) {
    $('#project_start').data("DateTimePicker").maxDate(e.date);
  });


  $('input #tags').on('change', function(event) {
    var $element = $(event.target),
      $container = $element.closest('.example');

    var val = $element.val();
    if (val === null)
      val = "null";
    $('code', $('pre.val', $container)).html( ($.isArray(val) ? JSON.stringify(val) : "\"" + val.replace('"', '\\"') + "\"") );
    $('code', $('pre.items', $container)).html(JSON.stringify($element.tagsinput('items')));
  }).trigger('change');

});
//# sourceMappingURL=all.js.map
