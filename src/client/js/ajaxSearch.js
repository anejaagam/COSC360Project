$(document).ready(function() 
{
    $("#search-input").keyup(function() 
    {
      var searchBarTerm = $(this).val();
      filterPosts(searchBarTerm);
    });

    function filterPosts(searchBarTerm) 
    {
      $.ajax({
        url: "../server/filterposts.php",
        type: "GET",
        data: { search: searchBarTerm },
        success: function(response) 
        {
          $(".col-md-8").html(response);
        },
        error: function(xhr, status, error) 
        {
          console.log(xhr.responseText);
        }
      });
  };
});
