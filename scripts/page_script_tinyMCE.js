tinymce.init({
    selector: '#textarea',
    theme: "modern",
    skin: 'light',  // resolved to http://domain.mine/myLayout.css
    height : "150",
    menubar: false,
    branding: false,
    toolbar: 'undo redo bold italic bullist numlist issue noissue removeref',
    plugins: 'codesample paste',
    oninit : "setPlainText",
    paste_as_text: true,
    setup: function (editor) {

    function insertIssue() 
    {
      var noti = "<div class='tags has-addons'><span class='tag is-danger'>Note:</span><span class='tag is-dark'>You are submitting an issue.</span></div>";
      var log = 1;
      $(".tinymce-bg").css("border","1px solid #ff5e51");
      $(".tinymce-noti").html(noti);
      $('input#issue').val(log);
      $("input#issuenum").val("0");
    }

    function removeIssue(){
      var log = 0;
      $(".tinymce-bg").css("border","none");
      $(".tinymce-noti").html("");
      $('input#issue').val(log);
      
    } 

     function removeRef(){
      var log = 0;
      $("input#issuenum").val(log);
      $("input#resolve").val(log);
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

      editor.addButton('removeref', {
      icon: 'insertdatetime',
      image: 'http://p.yusukekamiyamane.com/icons/search/fugue/icons/flag-white.png',
      tooltip: "Clear reference",
      onclick: removeRef
    });

    editor.on('change', function () {
      editor.save();
    });
    }

   








});
