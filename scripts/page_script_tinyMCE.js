tinymce.init({
    selector: '#textarea',
    theme: "modern",
    skin: 'light',  // resolved to http://domain.mine/myLayout.css
    height : "150",
    menubar: false,
    branding: false,
     toolbar: 'undo redo bold italic bullist numlist issue noissue',
    plugins: 'codesample',
    paste_as_text: true,
    setup: function (editor) {

    function insertIssue() 
    {
      var noti = "<div class='tags has-addons'><span class='tag is-dark'>Note:</span><span class='tag is-primary'>You are submitting an issue.</span></div>";
      var html = 1;
      $(".tinymce-noti").html(noti);
      $('#issue').val(html);
    }

    function removeIssue(){
      $('#issue').val("");
      $(".tinymce-bg").css("border","none");
      $(".tinymce-noti").html("");
    } 

     editor.addButton('issue', {
      icon: 'insertdatetime',
      image: 'http://p.yusukekamiyamane.com/icons/search/fugue/icons/flag--arrow.png',
      tooltip: "Submit issue",
      onclick: insertIssue
    });

     editor.addButton('noissue', {
      icon: 'insertdatetime',
      image: 'http://p.yusukekamiyamane.com/icons/search/fugue/icons/flag-white.png',
      tooltip: "Remove Issue",
      onclick: removeIssue
    });

    editor.on('change', function () {
      editor.save();
    });
    }

   








});
