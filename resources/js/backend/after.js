// Loaded after CoreUI app.js

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
const editor = document.querySelector('#editor');
console.log(editor.dataset.lang);
if (document.querySelector( '#editor' )) {
    ClassicEditor
        .create( editor, {
            language: (editor.dataset.lang == 'ur') ? 'ar' : editor.dataset.lang,
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
            }
        } )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
}
