jQuery(document).ready(function($) {


  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

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
        title: window.Laravel.are_you_sure_notification,
        text: window.Laravel.cannot_restore_notification,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: window.Laravel.yes_delete,
        cancelButtonText: window.Laravel.no,
        closeOnConfirm: false
      },
      function(){
        $(e.target).prev('.delete-project').submit();

      });

  });


  $("button#delete-user-button").on("click", function(e){

    swal({
        title: window.Laravel.are_you_sure_notification,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: window.Laravel.yes_delete,
        cancelButtonText: window.Laravel.no,
        closeOnConfirm: false
      },
      function(){
        $(e.target).prev('.delete-user').submit();

      });

  });


  $("a#groups-finish-button").on("click", function(e){
    if(!$("a#groups-finish-button").hasClass('not-empty')){
      e.preventDefault();

      swal({
        title: window.Laravel.finish_project_notification,
        type: "info",
        confirmButtonText: window.Laravel.yes,
        closeOnConfirm: false
      });
    }


  });

  // Select2
  $(".js-example-basic-multiple").select2();



  // Select2 Ajax - attaching users to project team manually
  $(".js-users-data-ajax").select2({
    placeholder: "Nimi või e-posti aadress",
    language: { inputTooShort: function () { return 'Kolm või rohkem tähte'; } },
    allowClear: true,
    ajax: {
      url: window.Laravel.search_user_api_url,
      dataType: 'json',
      delay: 250,
      method: 'POST',
      data: function (params) {
        return {
          q: params.term, // search term
          project_id: $('.js-users-data-ajax').attr("project-id"),
          page: params.page
        };
      },
      processResults: function (data) {
        return {
          results: $.map(data, function (item) {
            return {
              text: (item.full_name ? item.full_name : item.name) + ' ('+item.email+')',
              id: item.id
            }
          })
        };
      },
      cache: false
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 3
  });

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


  //TinyMC
  tinyMCE.baseURL = window.Laravel.base_path+"/js/tinymce";

  tinymce.init({
    mode : "textareas",
    theme : "modern",
    language: window.Laravel.language,
    plugins: "link",
    menubar: false,
    toolbar: "link",
    removeformat: [
      {selector: 'b,strong,em,i,font,u,strike', remove : 'all', split : true, expand : false, block_expand: true, deep : true},
      {selector: 'span', attributes : ['style', 'class'], remove : 'empty', split : true, expand : false, deep : true},
      {selector: '*', attributes : ['style', 'class'], split : false, expand : false, deep : true}
    ],
    selection_toolbar: 'bold italic | quicklink h2 h3 blockquote',
    editor_selector : "mceSimpleLink"
  });


  tinyMCE.init({
    mode : "textareas",
    language: window.Laravel.language,
    plugins: ["link", "lists"],
    height : "350",
    removeformat: [
      {selector: 'b,strong,em,i,font,u,strike', remove : 'all', split : true, expand : false, block_expand: true, deep : true},
      {selector: 'span', attributes : ['style', 'class'], remove : 'empty', split : true, expand : false, deep : true},
      {selector: '*', attributes : ['style', 'class'], split : false, expand : false, deep : true}
    ],
    toolbar: "redo undo bold italic numlist bullist link",
    menubar: false,
    editor_selector : "mceSimple"
  });


  //Front page logo translation
  if(window.Laravel.language == 'en'){
    $('.block01.block01b > .pad').css("background", 'url(css/bg05_en.png) no-repeat 50% 50%');
  }else{
    $('.block01.block01b > .pad').css("background", 'url(css/bg05.png) no-repeat 50% 50%');
  }


  //Select project share url on click on input
  $("input[name='share_url']").on("click", function () {
    $(this).select();
  });


  if($("#project_all_members").length) {
    //Drag and drop project group members functionality
    Sortable.create(project_all_members, {
      group: { name: "project-all-members", pull: true, put:true },
      animation: 150,
      handle: '.drag-handle'
    });

    var el = $('.project-group');
    $(el).each(function (i,e) {
      var sortable = Sortable.create(e, {
        group: {
          name: el.attr('group-id'),
          pull: true,
          put: function () {
            return true;
          }
        },
        animation: 150,
        handle: '.drag-handle',
        onAdd: function (evt) {

          var itemEl = evt.item;  // dragged HTMLElement
          var from = evt.from;


          $.ajax({
            url: window.Laravel.add_user_to_group_api_url,
            dataType: 'json',
            delay: 250,
            method: 'POST',
            cache: false,
            data: {

              to: $(itemEl).parent().attr('group-id'),
              from: $(from).attr('group-id'),
              user: $(itemEl).attr('user-id')

            }
          }).done(function( msg ) {
            console.log(msg);
            if($('a#groups-finish-button').length){
              $('a#groups-finish-button').addClass('not-empty');
            }


          });

        }

      });
    })
  }


  //Copy user main TLU email into contact email fields, used on profile page
  $("#filler").click(fillValues);


  function fillValues() {
    var value = $("#tlu_email").val();
    var fields= $(".contact-email");
    fields.each(function (i) {
      $(this).val(value);
    });
  }



  //Add custom institution field in user registration form
  $('#institution').on('change',function(){
    if( $(this).val() === window.Laravel.other_institution){
      $("#other-institution").show()
    }
    else{
      $("#other-institution").hide()
    }
  });



  // Add new group links input field
  $('.add_links_field_button').click(function(e){
    e.preventDefault();
    var $div = $('div[id^="group_links"]:last-child');

    var num = parseInt( $div.prop("id").match(/\d+/g), 10 );
    $('#group_links'+num).clone().prop('id', 'group_links'+(num+1)).insertAfter("#group_links"+num).find(":text").val("");
  });



});

Dropzone.autoDiscover = false;
Dropzone.prototype.defaultOptions.dictRemoveFile = window.Laravel.remove_file_button;

var dropzones = $(".dropzone");
dropzones.each(function (i) {
  //Group images upload
  var group_id = parseInt( $(this).prop("id").match(/\d+/g), 10 );

  var project_id = $('#groupImagesUpload').attr("project-id");
  var dropzone_name = '#groupImagesUpload'+group_id;

   var myDropzone = new Dropzone(dropzone_name, {
    url: window.Laravel.base_path+"/project/"+project_id+"/finish/uploadFiles",
    params: {
      _token: window.Laravel.csfr_token,
      group_id: group_id
    },
    parallelUploads: 20,
    paramName: "file",
    maxFilesize: 2, // MB


    addRemoveLinks: true,
    init:function() {

      // Add server images
      var myDropzone = this;

      $.get(window.Laravel.base_path+"/api/group-images?groupid="+group_id, function(data) {


        $.each(data.images, function (key, value) {

          var file = {name: value.name, size: value.size};
          myDropzone.options.addedfile.call(myDropzone, file);
          myDropzone.createThumbnailFromUrl(file, window.Laravel.base_path+"/storage/projects_groups_images/"+group_id+"/"+value.name);
          myDropzone.emit("complete", file);
          var btndelete = file.previewElement.querySelector("[data-dz-remove]");
          btndelete.setAttribute("id", 'delete-media-name-'+value.name);

        });
      });

      this.on("removedfile", function(file) {

        var btndelete = file.previewElement.querySelector("[data-dz-remove]");
        if(btndelete.hasAttribute("id")) {
          var filename = btndelete.getAttribute("id").split('-').pop();
        }

        $.ajax({
          url: window.Laravel.base_path+"/project/"+project_id+"/finish/deleteFile",
          dataType: 'json',
          delay: 250,
          method: 'POST',
          cache: false,
          data: {

            name: filename,
            group_id: group_id

          }
        }).done(function( msg ) {
          console.log(msg);

        });

      } );
    },
    success: function(file, serverResponse) {
      var fileuploded = file.previewElement.querySelector("[data-dz-name]");
      fileuploded.innerHTML = serverResponse.newfilename;
      var btndelete = file.previewElement.querySelector("[data-dz-remove]");
      btndelete.setAttribute("id", 'delete-media-name-'+serverResponse.newfilename);
    }
  });
});








/*
  Sending DELETE request without a form
  Example:
  <a href="posts/2" data-method="delete" data-token="{{csrf_token()}}">
 */

(function() {

  var laravel = {
    initialize: function() {
      this.methodLinks = $('a[data-method]');
      this.token = $('a[data-token]');
      this.registerEvents();
    },

    registerEvents: function() {
      this.methodLinks.on('click', this.handleMethod);
    },

    handleMethod: function(e) {
      var link = $(this);
      var httpMethod = link.data('method').toUpperCase();
      var form;

      // If the data-method attribute is not PUT or DELETE,
      // then we don't know what to do. Just ignore.
      if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
        return;
      }

      // Allow user to optionally provide data-confirm="Are you sure?"
      if ( link.data('confirm') ) {
        if ( ! laravel.verifyConfirm(link) ) {
          return false;
        }
      }

      form = laravel.createForm(link);
      form.submit();

      e.preventDefault();
    },

    verifyConfirm: function(link) {
      return confirm(link.data('confirm'));
    },

    createForm: function(link) {
      var form =
        $('<form>', {
          'method': 'POST',
          'action': link.attr('href')
        });

      var token =
        $('<input>', {
          'type': 'hidden',
          'name': '_token',
          'value': link.data('token')
        });

      var hiddenInput =
        $('<input>', {
          'name': '_method',
          'type': 'hidden',
          'value': link.data('method')
        });

      return form.append(token, hiddenInput)
        .appendTo('body');
    }
  };

  laravel.initialize();

})();

//# sourceMappingURL=all.js.map
