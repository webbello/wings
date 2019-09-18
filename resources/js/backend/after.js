// Loaded after CoreUI app.js

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
if (document.querySelector( '#editor' )) {
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
}