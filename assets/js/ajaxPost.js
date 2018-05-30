

$(document).ready(function(){
    $('#updateBtn').click(function(){
        $("#printPost").load('getPosts.php');
    });
});

// var values = $("#messageBox").serialize();
//
// $.ajax({
//        url: "posts-create.php",
//        type: "post",
//        data: values,
//        success: function (response) {
//           alert(response);               
//
//        },
//        error: function(jqXHR, textStatus, errorThrown) {
//           console.log(textStatus, errorThrown);
//        }
//
//
//    });
    
$(document).ready( function() {
  var form = $("#messageBox");

  form.find('select:first').change( function() {
    $.ajax( {
      type: "POST",
      url: form.attr( "posts-create.php" ),
      data: form.serialize(),
      success: function( response ) {
        console.log( response );
        alert(form.serialize());
      }
    } );
  } );

} );