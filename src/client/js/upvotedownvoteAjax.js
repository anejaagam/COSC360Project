$(document).ready(function() 
{
    $('.btn-upvote').click(function() 
    {
      var button = $(this);
      var postId = button.data('post-id');
  
      $.ajax({
        type: 'POST',
        url: '../server/upvotedownvote.php',
        data: { action: 'upvote', post_id: postId },
        success: function(response) {
          button.find('.vote-status').text('Upvoted!');
          button.prop('disabled', true);
          button.siblings('.btn-downvote').prop('disabled', true);
        }
      });
    });
  
    $('.btn-downvote').click(function() 
    {
      var button = $(this);
      var postId = button.data('post-id');
  
      $.ajax({
        type: 'POST',
        url: '../server/upvotedownvote.php',
        data: { action: 'downvote', post_id: postId },
        success: function(response) {
          button.find('.vote-status').text('Downvoted!');
          button.prop('disabled', true); 
          button.siblings('.btn-upvote').prop('disabled', true);
        }
      });
    });
});