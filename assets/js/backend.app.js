function init_ace_editor() {

    return;

    var editor_obj = jQuery(".is_ace_editor .acf-input");

    if (!editor_obj.length) return;

    var post_update_button = jQuery("input[type=submit][name=publish]");
    var editor_array = [];


    editor_obj.each(function () {

        var elem = jQuery(this);

        var id = elem.find('textarea').attr('id');
        var name = elem.find('textarea').attr('name');

        var editor = ace.edit(elem.get(0));
        editor.setTheme("ace/theme/twilight");
        var mode = 'scss';
        editor.session.setMode("ace/mode/" + mode);
        editor.setOption("enableEmmet", true);

        elem.find(".ace_text-input")
            .attr('id', id)
            .attr('name', name);



        editor_array.push(editor);
    });


    post_update_button.click(function (e) {



        // jQuery.each(editor_array, function (c, editor) {
        //     console.log(editor.container);
        //     var editor_value = editor.getValue();
        //     // editor.destroy();
        //     console.log(editor_value);
        //     // send editor_value to wp api?
        // });

        //
        // console.log(wpApiSettings.nonce);
        // jQuery.ajax({
        //     url: wpApiSettings.root + 'acf/v3/options/field_5a12cd67507c0',
        //     method: 'POST',
        //     beforeSend: function (xhr) {
        //         xhr.setRequestHeader('X-WP-Nonce', wpApiSettings.nonce);
        //     },
        //     data: {
        //         'title': 'test'
        //     }
        // }).done(function (response) {
        //     console.log(response);
        // });
        //
        // jQuery.ajax({
        //     url: wpApiSettings.root + 'wp/v2/posts/1',
        //     // method: 'GET',
        //     method: 'POST',
        //     beforeSend: function (xhr) {
        //         xhr.setRequestHeader('X-WP-Nonce', wpApiSettings.nonce);
        //     },
        //     data: {
        //         'title' : 'updated page title 3'
        //     }
        // }).done(function (response, status) {
        //     console.log(response, status);
        //     console.log('test');
        // });
        //
        // jQuery.ajax({
        //     url: wpApiSettings.root + 'acf/v2/post/1',
        //     // method: 'GET',
        //     method: 'PUT',
        //     beforeSend: function (xhr) {
        //         xhr.setRequestHeader('X-WP-Nonce', wpApiSettings.nonce);
        //     },
        //     data: {
        //         "fields": {
        //             "test": "updated acf value"
        //         }
        //     },
        //     dataType: 'json',
        // }).done(function (response, status) {
        //     console.log(response, status);
        // });
        //
        // jQuery.ajax({
        //     url: wpApiSettings.root + 'acf/v3/options/options/is_global_type_heading_one_scss',
        //     // method: 'GET',
        //     method: 'POST',
        //     beforeSend: function (xhr) {
        //         xhr.setRequestHeader('X-WP-Nonce', wpApiSettings.nonce);
        //     },
        //     data: {
        //         "fields": {
        //             "is_global_type_heading_one_scss": "updated?"
        //         }
        //     },
        //     dataType: 'json',
        // }).done(function (response, status) {
        //     console.log(response, status);
        // });
        //
        // jQuery.ajax({
        //     url: wpApiSettings.root + 'acf/v2/options/is_global_type_heading_one_scss',
        //     method: 'GET',
        //     // method: 'POST',
        //     // beforeSend: function (xhr) {
        //     //     xhr.setRequestHeader('X-WP-Nonce', wpApiSettings.nonce);
        //     // },
        // }).done(function (response, status) {
        //     console.log(response, status);
        // });
        //
        // console.log('Post update featured disabled pending figuring out how to save');


    });

}

function init_api_global_template_update() {

    return;

    console.log(wpApiSettings);

    // jQuery.ajax( {
    //     url: wpApiSettings.root + 'wp/v2/posts/1',
    //     method: 'POST',
    //     beforeSend: function ( xhr ) {
    //         xhr.setRequestHeader( 'X-WP-Nonce', wpApiSettings.nonce );
    //     },
    //     data:{
    //         'title' : 'Hello 2oon'
    //     }
    // } ).done( function ( response ) {
    //     console.log( response );
    // } );

    jQuery.ajax({
        url: wpApiSettings.root + 'acf/v2/options/field_5a29673e16638',
        method: 'POST',
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-WP-Nonce', wpApiSettings.nonce);
        }
    }).done(function (response) {
        console.log(response);
    });

}

init_ace_editor();
init_api_global_template_update();
