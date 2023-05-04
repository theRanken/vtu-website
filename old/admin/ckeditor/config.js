/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */


CKEDITOR.editorConfig = function( config ) {
    	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.height = 370;
	
	config.filebrowserBrowseUrl = './kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl = './kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl = './kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl = './kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl = './kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl = './kcfinder/upload.php?type=flash';


	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'About,ShowBlocks,Maximize,NewPage,Templates,Textarea,TextField,Radio,Checkbox,Iframe,PageBreak,Flash,Table,Form,Select,Button,ImageButton,HiddenField,Language,CreateDiv,Blockquote,Save';


};
