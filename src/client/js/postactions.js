$(document).ready(function() 
{
    $(".btn-delete").click(function() 
    {
        var button = $(this);
        var postId = button.data("post-id"); 
        $.ajax({
            url: "../server/deletepost.php", 
            type: "POST",
            data: { post_id: postId }, 
            success: function(response) 
            {
                if(response == "successsuccess")
                {
                    button.closest(".card").remove();
                } 
                else 
                {
                    console.log(response);
                }
            }
        });
    });

    $("#create").click(function(e) 
    {
        e.preventDefault();  

        var postTitle = $("#post-title").val();
        var postBody = $("#post-body").val();

    $.ajax({
        url: "../server/createpost.php", 
        type: "POST",
        data: { post_title: postTitle, post_body: postBody }, 
        success: function(response)
        {
            if(response == "success")
            {
                location.reload();
            } 
            else 
            {
                console.log(response);
            }
        }
    });
});
});