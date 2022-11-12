document.addEventListener('DOMContentLoaded', () => {
    initSample('editor');
})
if (CKEDITOR.env.ie && CKEDITOR.env.version < 9)
    CKEDITOR.tools.enableHtml5Elements(document);
// The trick to keep the editor in the sample quite small
// unless user specified own height.
CKEDITOR.config.language = 'es';
CKEDITOR.config.height = 150;
CKEDITOR.config.resize_maxHeight = 300;
CKEDITOR.config.width = 'auto';

function initSample(editor) {
    CKEDITOR.replace(editor, {
        toolbar: [
            { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
            { name: 'basicStyles', items: ['Bold', 'Italic', 'BulletedList', 'Stricke', '-', 'Link', 'Unlink', 'Format'] },
            { name: 'document', items: ['CodeSnippet', 'EmojiPanel', 'Preview', 'Source'] }
        ]
    });
}




// var initSample = (function() {
//     var wysiwygareaAvailable = isWysiwygareaAvailable();
//     // isBBCodeBuiltIn = !!CKEDITOR.plugins.get('bbcode');

//     return function() {
//         var editorElement = CKEDITOR.document.getById('editor');

//         // :(((
//         // if (isBBCodeBuiltIn) {
//         //     editorElement.setHtml(
//         //         'Hello world!\n\n' +
//         //         'I\'m an instance of [url=https://ckeditor.com]CKEditor[/url].'
//         //     );
//         // }

//         // Depending on the wysiwygarea plugin availability initialize classic or inline editor.
//         if (wysiwygareaAvailable) {
//             CKEDITOR.replace('editor');
//         } else {
//             editorElement.setAttribute('contenteditable', 'true');
//             CKEDITOR.inline('editor');

//             // TODO we can consider displaying some info box that
//             // without wysiwygarea the classic editor may not work.
//         }
//     };

//     function isWysiwygareaAvailable() {
//         // If in development mode, then the wysiwygarea must be available.
//         // Split REV into two strings so builder does not replace it :D.
//         if (CKEDITOR.revision == ('%RE' + 'V%')) {
//             return true;
//         }

//         return !!CKEDITOR.plugins.get('wysiwygarea');
//     }
// })();