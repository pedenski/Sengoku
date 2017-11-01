tinymce.init({
    selector: '#textarea',
    theme: "modern",
    skin: 'light',  // resolved to http://domain.mine/myLayout.css
    height : "150",
    menubar: false,
    branding: false,
    toolbar: 'undo redo bold italic bullist numlist   codesample',
    plugins: 'codesample',
    paste_as_text: true,
     setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
      }
});
