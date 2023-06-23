var postTitleInput = document.getElementById("post-title");
var postBodyInput = document.getElementById("post-body");
var createButton = document.getElementById("create");

postTitleInput.addEventListener("input", validatePostCreation);
postBodyInput.addEventListener("input", validatePostCreation);

function validatePostCreation() 
{
    var postTitle = postTitleInput.value.trim();
    var postBody = postBodyInput.value.trim();

    if (postTitle !== "" && postBody !== "") 
        createButton.disabled = false;
    else 
        createButton.disabled = true;
}

createButton.addEventListener("click", function(e) 
{
  e.preventDefault();

  var postTitle = postTitleInput.value.trim();
  var postBody = postBodyInput.value.trim();

  resetValidationStyles();

  var isPostValid = true;

  if (postTitle === "") 
  {
    isPostValid = false;
    highlightField("post-title");
  }

  if (postBody === "") 
  {
    isPostValid = false;
    highlightField("post-body");
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
  for (var i = 0; i < formFields.length; i++) {
    formFields[i].classList.remove("is-invalid");
  }
}

createButton.disabled = true;
