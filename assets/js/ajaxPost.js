/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$(document).ready(function(){
//    $("#updateBtn").click(function(){
//        $.ajax({
//            url: 'loadHtml.html',
//            success: function(data){
//                $('#printPost').html(data);
//            }
//        });
//    });
//});

$(document).ready(function(){
    $('#updateBtn').click(function(){
        $("#printPost").load('getPosts.php');
    });
});