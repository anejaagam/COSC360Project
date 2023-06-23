document.getElementById("signupForm").addEventListener("submit", function(e)
{
    e.preventDefault(); 
  
    var firstName = document.getElementById("firstname").value;
    var lastName = document.getElementById("lastname").value;
    var email = document.getElementById("email").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmpass").value;
  
    resetValidationStyles();
  
    var isFormValid = true;
  
    if (firstName.trim() === "")
    {
        isFormValid = false;
        highlightField("firstname");
    }
  
    if (lastName.trim() === "")
    {
        isFormValid = false;
        highlightField("lastname");
    }
  
    if (email.trim() === "")
    {
        isFormValid = false;
        highlightField("email");
    }
  
    if (username.trim() === "")
    {
        isFormValid = false;
        highlightField("username");
    }
  
    if (password.trim() === "")
    {
        isFormValid = false;
        highlightField("password");
    }
  
    if (confirmPassword.trim() === "")
    {
        isFormValid = false;
        highlightField("confirmpass");
    }
  
    if (password !== confirmPassword)
    {
        isFormValid = false;
        highlightField("password");
        highlightField("confirmpass");
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
  
  