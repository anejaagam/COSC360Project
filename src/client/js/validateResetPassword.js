document.getElementById("resetPasswordForm").addEventListener("submit", function(e)
{
    e.preventDefault(); 
  
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var newpassword = document.getElementById("newpassword").value;
  
    resetValidationStyles();
  
    var isFormValid = true;
  
    if (username.trim() === "")
    {
        isFormValid = false;
        highlightField("username");
    }
  
    if (email.trim() === "")
    {
        isFormValid = false;
        highlightField("email");
    }
  
    if (newpassword.trim() === "")
    {
        isFormValid = false;
        highlightField("newpassword");
    }
  
    if (isFormValid)
    {
        this.submit();
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
  
  