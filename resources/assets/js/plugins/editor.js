import SimpleMDE from 'simplemde';

var simplemde = new SimpleMDE({
    element: document.getElementById('article-editor'),
    spellChecker: false,
    autoDownloadFontAwesome: false,
    autosave: {
        enabled: false,
        uniqueId: window.location.pathname,
        delay: 1000,
    },
    toolbar: [
        "bold", "italic", "strikethrough", "heading", "|", "image", "code", "quote", "table", "unordered-list", "|", "ordered-list", "preview", "side-by-side", "fullscreen",
        {
            name: 'more',
            action: function (editor) {
                var cm = editor.codemirror;
                cm.replaceSelection("<!--more-->");
            },
            className: "fa fa-header",
            title: "insert more tag"
        }
    ],
    autofocus: true,
    indentWithTabs: false,
    renderingConfig: {
        codeSyntaxHighlighting: true
    }
});