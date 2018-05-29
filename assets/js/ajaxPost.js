/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $("#updateBtn").click(function(){
        $.ajax({
            url: 'getPosts.php',
            success: function(data){
                $('#printPost').php(data);
            }
        });
    });
});

