/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var postId=0;
var postBodyElement= null;
$('.post').find('.interaction').find('.edit').on('click',function(event)
{
    event.preventDefault();
    postBodyElement=event.target.parentNode.parentNode.childNodes[1];
    var postBody=event.target.parentNode.parentNode.childNodes[1].textContent;
    postId=event.target.parentNode.parentNode.dataset['postid'];
    $('#post-body').val(postBody);
   $('#edit-modal').modal();
});
$('#modal-save').on('click',function()
{
    $.ajax({
        method:'POST',
        url:urlEdit,
        data:{body:$('#post-body').val(),postId:postId,_token:token}
    }).done(function(msg)
    {
        $(postBodyElement).text(msg['new_body']);
        $('#edit-modal').modal('hide');
    });
});

$('.like').on('click',function(event)
{
    event.preventDefault();
    postId=event.target.parentNode.parentNode.dataset['postid']
    var isLike=event.target.previousElementSibling==null ;
    $.ajax({
        method:'POST',
        url:urlLike,
        data:{isLike:isLike,postId:postId,_token:token}
    }).done(function()
    {
       event.target.innerText = isLike ? event.target.innerText=='Like' ? 'Already You Liked this' : 'Like': event.target.innerText=='DisLike' ? 'Already You DisLiked this' : 'DisLike';
       if(isLike)
       {
           event.target.nextElementSibling.innerText='DisLike';
       }
       else
       {
           event.target.previousElementSibling.innerText='Like';
       }
    });
});
