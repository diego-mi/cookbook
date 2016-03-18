$(document).ready(function () {

    $('.codeEditorPostList').each(function(){
        editor(document.getElementById($(this).prop("id")));
    });

    function editor(id)
    {
        CodeMirror.fromTextArea(id, {
            lineNumbers: true,
            matchBrackets: true,
            styleActiveLine: true
        });
    }
});