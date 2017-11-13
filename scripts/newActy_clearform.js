$("#reset").click(function() {
    $(this).closest('form').find("input[type=text]").val("");
    $('#datetimepicker7') .datetimepicker('reset');
    tinyMCE.activeEditor.setContent('');
});
