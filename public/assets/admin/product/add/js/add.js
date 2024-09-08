

  // tags select2
  $(".tags_select_select2").select2({
    tags: true,
    // tokenSeparators: [',', ' '] // default
    tokenSeparators: [',', '.'] 
  })  
  $(".attributeSelect").select2({
    // tags: true,
  })  

  // place holder (category single) select2
  $(".js-example-placeholder-single").select2({
    placeholder: "Chọn Danh Mục",
    allowClear: true
  });

  // rich text editer Editor Integration
  var editor_config = {
    path_absolute : "/",
    selector: 'textarea.tiny-editor',
    relative_urls: false,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table directionality",
      "emoticons template paste textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    file_picker_callback : function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };

  tinymce.init(editor_config);

  // tinymce.init({
  //   selector: 'textarea.tiny-editor',
  //   width: 600,
  //   height: 300,
  //   plugins: [
  //     'advlist autolink link image lists charmap print preview hr anchor pagebreak',
  //     'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
  //     'table emoticons template paste help'
  //   ],
  //   toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
  //     'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
  //     'forecolor backcolor emoticons | help',
  //   menu: {
  //     favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
  //   },
  //   menubar: 'favs file edit view insert format tools table help',
  //   content_css: 'css/content.css'
  // });
