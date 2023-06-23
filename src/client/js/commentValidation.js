var commentInput = document.getElementById("comment-body");
var commentButton = document.getElementById("create");

commentInput.addEventListener("input", validateCommentCreation);

function validateCommentCreation() 
{
    var commentInfo = commentInput.value.trim();

    if (commentInfo !== "") 
    {
        commentButton.disabled = false;
    } 
    else 
    {
        commentButton.disabled = true;
    }
}

commentButton.addEventListener("click", function(e) 
{
    e.preventDefault();

    var commentInfo2 = commentInput.value.trim();

    resetValidationStyles();

    var isCommentValid = true;

    if (commentInfo2 === "") 
    {
        isCommentValid = false;
        highlightField("comment-body");
    }
});

function highlightField(fieldId) 
{
    var field = document.getElementById(fieldId);
    field.classList.add("is-invalid");
}

function resetValidationStyles() 
{
    var formFields = document.getElementsByClassName("form-control");
    for (var i = 0; i < formFields.length; i++) 
    {
        formFields[i].classList.remove("is-invalid");
    }
}

commentButton.disabled = true;
