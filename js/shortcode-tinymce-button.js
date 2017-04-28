
(function() {

    tinymce.PluginManager.add('pushortcodes', function( editor )
    {
        var menuItems = [];
        jQuery.each(shortcode_list, function(key, val)
        {
            menuItems.push({
	            text: key,
	            icon: false,
	            onclick: function() {
		        	var args = '';
		        	if(val.attr){
			        	jQuery.each(val.attr, function(k,v){
			        		args += ' ' + k + '="' + v + '"';
			        	});
		        	}
                	
	                tinyMCE.activeEditor.selection.setContent( '[' + key + args + '][/' + key + ']' );
	            }
	        });
        });

        editor.addButton('pushortcodes', {
            type: 'menubutton',
	        icon: false,
            text: 'Shortcodes',
            menu: menuItems,
            context: 'insert'
        });
    });
})();

