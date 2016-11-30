jQuery(document).ready(function($) {
  $('#project_start').datetimepicker({
    format: 'L'
  });

  $('#project_end').datetimepicker({
    format: 'L'
  });

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

  $("button #delete").on("click", function(){

    swal({
        title: "Kas olete kindel?",
        text: "Projekti ei saa taastada!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Jah, kustutan!",
        cancelButtonText: "Ei",
        closeOnConfirm: false
      },
      function(){
        $("#delete-project").submit();
      });

  });


  $(".js-example-basic-multiple").select2();

});