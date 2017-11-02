tinymce.init({
    selector: '#textarea',
    theme: "modern",
    skin: 'light',  // resolved to http://domain.mine/myLayout.css
    height : "350",
    menubar: false,
    branding: false,
    toolbar: 'undo redo styleselect bold italic bullist numlist outdent indent code codesample',
    plugins: 'advlist autolink link image lists charmap print preview code codesample paste',
    paste_as_text: true,
     setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
      }
});
