
import {ImageResize} from '../../../../node_modules/ckeditor5/ckeditor5-image/src/imageresize';
import {ImageToolbar} from '../../../../node_modules/ckeditor5/ckeditor5-image/src/imagetoolbar';
import {ImageCaption} from '../../../../node_modules/ckeditor5/ckeditor5-image/src/imagecaption';
import {ImageStyle} from '../../../../node_modules/ckeditor5/ckeditor5-image/src/imagestyle';
import {ImageUpload} from '../../../../node_modules/ckeditor5/ckeditor5-image/src/imageupload';

ClassicEditor.create(document.querySelector("#kt_docs_ckeditor_classic"), {
        plugins: [Image, ImageResizeEditing, ImageResizeHandles],
    })
    .then((editor) => {
        console.log(editor);
    })
    .catch((error) => {
        console.error(error);
    });
