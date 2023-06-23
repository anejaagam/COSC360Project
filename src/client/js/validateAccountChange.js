document.getElementById("accountChange").addEventListener("submit", function(e)
{
    e.preventDefault(); 
  
    var username = document.getElementById("username").value;
    var firstname = document.getElementById("first_name").value;
    var lastname = document.getElementById("last_name").value;
  
    resetValidationStyles();
  
    var isFormValid = true;
  
    if (username.trim() === "")
    {
        isFormValid = false;
        highlightField("username");
    }
  
    if (firstname.trim() === "")
    {
        isFormValid = false;
        highlightField("first_name");
    }
  
    if (lastname.trim() === "")
    {
        isFormValid = false;
        highlightField("last_name");
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
  
  