$(document).ready(function() 
{
    $('#create').click(function(e) 
    {
        e.preventDefault();
        var comment = $('#comment-body').val();
       
        console.log(post_id);
        $.ajax({
            url: '../server/comment.php',
            method: 'POST',
            data: {
                comment: comment
            },
            success: function() {
                // Refresh comments
                location.reload();
            }
        });
    });
    $(".btn-delete").click(function() 
    {
        var button = $(this);
        var commentId = button.data("post-id"); 
        $.ajax({
            url: "../server/deletecomment.php", 
            type: "POST",
            data: { comment_id: commentId }, 
            success: function(response) 
            {
                if(response == "success") 
                {
                    button.closest(".comment").remove();
                } 
                else 
                {
                    console.log(response);
                }
            }
        });
    });
});
