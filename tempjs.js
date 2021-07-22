<script> 
      function validate() { 
        var name = 
          document.forms["RegForm"]["Name"]; 
        var email = 
          document.forms["RegForm"]["EMail"]; 
        var phone = 
          document.forms["RegForm"]["Phone"]; 
        var country = 
          document.forms["RegForm"]["Country"]; 
        var city = 
          document.forms["RegForm"]["City"]; 
        var address = 
          document.forms["RegForm"]["Address"]; 
        var mobile = 
          document.forms["RegForm"]["Mobile"]; 
        var nationality = 
          document.forms["RegForm"]["Nationality"]; 
        var pin = 
          document.forms["RegForm"]["Pin"]; 

        if (name.value == "") { 
          window.alert("Please enter your Name."); 
          name.focus(); 
          return false; 
        } 

        if (address.value == "") { 
          window.alert("Please enter your Address."); 
          address.focus(); 
          return false; 
        } 

        if (email.value == "") { 
          window.alert( 
          "Please enter a valid e-mail address."); 
          email.focus(); 
          return false; 
        } 

        if (phone.value == "") { 
          window.alert( 
          "Please enter your telephone number."); 
          phone.focus(); 
          return false; 
        } 

        if (country.value == "") { 
          window.alert("Please enter your Country"); 
          password.focus(); 
          return false; 
        } 

        if (city.value == "") { 
          alert("Please enter your City."); 
          what.focus(); 
          return false; 
        }

        if (pin.value == "") { 
          alert("Please enter your Pin Code."); 
          what.focus(); 
          return false; 
        }

        if (mobile.value == "") { 
          alert("Please enter your Mobile Number."); 
          what.focus(); 
          return false; 
        } 

        if (nationality.value == "") { 
          alert("Please enter your Nationality."); 
          what.focus(); 
          return false; 
        }

        return true; 
      } 
    </script> 
    