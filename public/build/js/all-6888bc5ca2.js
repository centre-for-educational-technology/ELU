jQuery(document).ready(function($) {

  // Date picker
  $('#project_start').datetimepicker({
    format: 'L'
  });

  $('#project_end').datetimepicker({
    format: 'L'
  });

  $('#join_deadline').datetimepicker({
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



  // Tags input
  $('input #tags').on('change', function(event) {
    var $element = $(event.target),
      $container = $element.closest('.example');

    var val = $element.val();
    if (val === null)
      val = "null";
    $('code', $('pre.val', $container)).html( ($.isArray(val) ? JSON.stringify(val) : "\"" + val.replace('"', '\\"') + "\"") );
    $('code', $('pre.items', $container)).html(JSON.stringify($element.tagsinput('items')));
  }).trigger('change');


  // Sweet alert
  $("button#delete").on("click", function(e){

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
        $(e.target).prev('.delete-project').submit();

      });

  });


  $("button#delete-user-button").on("click", function(e){

    swal({
        title: "Kas olete kindel?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Jah, kustutan!",
        cancelButtonText: "Ei",
        closeOnConfirm: false
      },
      function(){
        $(e.target).prev('.delete-user').submit();

      });

  });

  // Select2
  $(".js-example-basic-multiple").select2();

  //Smooth scroll for front page
  $('body.frontpage a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });



  //Go from front page to certain tab in FAQ page
  var hash = window.location.hash;
  if(hash.startsWith('#item')){
    hash && $('ul.nav a[href="' + hash + '"]').tab('show');
  }

  //Search form
  $('.search-panel .navbar-nav').find('a').click(function(e) {
    e.preventDefault();
    var param = $(this).attr("href").replace("#","");
    var concept = $(this).text();
    $('.search-panel span#search_concept').text(concept);
    $('.form-group #search_param').val(param);
  });

  var selector = '.search-panel .navbar-nav li';

  $(selector).on('click', function(){
    $(selector).removeClass('active');
    $(this).addClass('active');
  });



  //Panel used in search view to show a list of member emails
  $('.panel-heading span.clickable').parents('.panel').find('.panel-body').slideUp();

  $('.panel-heading span.clickable').on("click", function(e){
    var $this = $(this);
    if(!$this.hasClass('panel-collapsed')) {
      $this.parents('.panel').find('.panel-body').slideUp();
      $this.addClass('panel-collapsed');
      $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
    } else {
      $this.parents('.panel').find('.panel-body').slideDown();
      $this.removeClass('panel-collapsed');
      $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
    }
  });


  //Facebook sharing button handler, Facebook SDK for JavaScript
  function postToFeed(title, desc, url, image){
    var obj = {method: 'feed',link: url, picture:image, name: title,description: desc};
    function callback(response){}
    FB.ui(obj, callback);
  }


  $('.btnShare').click(function(){
    elem = $(this);
    postToFeed(elem.data('title'), elem.data('desc'), elem.prop('href'), elem.data('image'));

    return false;
  });


  //TinyMCE
  tinyMCE.baseURL = "js/tinymce";

  tinymce.init({
    selector: '.tinymce',
    mode : "textareas",
    theme : "modern",
    plugins: "link",
    menubar: "insert",
    toolbar: "link",
    selection_toolbar: 'bold italic | quicklink h2 h3 blockquote',
    menu: {
      edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
      format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript'},
    }
  });


});



//# sourceMappingURL=all.js.map
