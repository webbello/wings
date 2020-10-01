// Loaded after CoreUI app.js

import ClassicEditor from '@ckeditor/ckeditor5-custom-build-classic/build/ckeditor.js';
const editor = document.querySelector('#editor');
console.log(editor.dataset.lang);
if (document.querySelector( '#editor' )) {
    ClassicEditor
        .create( editor, {
            language: (editor.dataset.lang == 'ur') ? 'ar' : editor.dataset.lang,
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'underline',
                    '|',
                    'fontFamily',
                    'fontSize',
                    'fontColor',
                    'alignment',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'indent',
                    'outdent',
                    '|',
                    'link',
                    'blockQuote',
                    'imageUpload',
                    'insertTable',
                    'mediaEmbed',
                    'undo',
                    'redo',
                    'codeBlock',
                    'MathType',
                    'ChemType',
                    'horizontalLine',
                    'removeFormat'
                ]
            },
            image: {
                // You need to configure the image toolbar, too, so it uses the new style buttons.
                toolbar: [ 'imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight' ],
    
                styles: [
                    // This option is equal to a situation where no style is applied.
                    'full',
    
                    // This represents an image aligned to the left.
                    'alignLeft',
    
                    // This represents an image aligned to the right.
                    'alignRight'
                ]
            },
            simpleUpload: {
                // The URL that the images are uploaded to.
                uploadUrl: '/admin/ckeditor/upload',
    
                
            }
        } )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
}
