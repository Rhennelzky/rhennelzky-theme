jQuery(document).ready(function($) {

// Instantiates the variable that holds the media library frame.
    var meta_image_frame
    // Runs when the image button is clicked.
    $('#add_image').click(function(e) {
      // Get preview pane      
      var images_of_gallery = $("#images_of_gallery");;
      var image = '';
      var publish = $("#publish");
      // var meta_image_preview = $(this)
      //   .parent()
      //   .parent()
      //   .children('.image-preview')
      // Prevents the default action from occuring.
      e.preventDefault()
      // var meta_image = $(this)
      //   .parent()
      //   .children('.meta-image')
      // If the frame already exists, re-open it.
      if (meta_image_frame) {
        meta_image_frame.open()
        return
      }
      // Sets up the media library frame
      meta_image_frame = wp.media({
        title: 'Choose Picture',
        button: {
          text: 'Select For Gallery',
        },
        multiple: false
      })
      // Runs when an image is selected.
      meta_image_frame.on('select', function() {
        // Grabs the attachment selection and creates a JSON representation of the model.
        var attachment = meta_image_frame.state().get('selection').first().toJSON();
        // Sends the attachment URL to our custom image input field.

        image = images_of_gallery.val();

        if (image == ''){
          
          images_of_gallery.val(attachment.id);
          publish.click();
         // console.log('wala');


        } else {          

          images_of_gallery.val(image + ',' + attachment.id);
          publish.click();

          //console.log(image + ',' + attachment.id);

        }

        //alert(attachment.id);

        //meta_image_preview.children('img').attr('src', media_attachment.url)
      })
      // Opens the media library frame.
      meta_image_frame.open();
    });

    $('#image_gallery').on("click", '.package_gallery', function(){

      var curr_index = $('.package_gallery').index(this);

      $("#image_to_del").val(curr_index);

      $("#publish").click();

    });

});