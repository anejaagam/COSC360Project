$(document).ready(function() 
{
    $(".btn-delete").click(function() 
    {
        var button = $(this);
        var userId = button.data("post-id"); 
        $.ajax({
            url: "../server/deleteuser.php", 
            type: "POST",
            data: { user_id: userId }, 
            success: function(response) 
            {
                if(response == "successsuccesssuccess")
                {
                    button.closest(".users").remove();
                    
                } 
                else 
                {
                    console.log(response);
                }
            }
        });
    });
});