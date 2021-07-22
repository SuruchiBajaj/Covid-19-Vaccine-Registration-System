
      function printError(elemId, hintMsg) {
        alert(elemId+ " ");
    document.getElementById(elemId).innerHTML = hintMsg;
    alert(elemId + document.getElementById(elemId).innerHTML);
}

document.cookie = "name = value1;email = value2;address = value3; city=value4; county=value5; nation=value6";

// Defining a function to validate form 
function validateForm() 
{
    // Retrieving the values of form elements 
    var name = document.RegForm.Name.value;
    var email = document.RegForm.Email.value;
    var phone = document.RegForm.Phone.value;
    var address = document.RegForm.Address.value;
    var nation = document.RegForm.Nationality.value;
    var pin = document.RegForm.Pin.value;
    var mobile = document.RegForm.Mobile.value;
    var country = document.RegForm.Country.value;
    var city = document.RegForm.City.value;
    var gender = document.RegForm.Gender.value;
    var day = document.getElementById("Day");
    var month = document.getElementById("Month");
    var year = document.RegForm.Year.value;

    // Defining error variables with a default value
    var nameErr = emailErr = mobileErr = countryErr = genderErr =  phoneErr = cityErr = nationErr = pinErr = addressErr = dayEr = monthErr = yearErr = true;
    
    // Validate mobile number
    if(mobile == "") {
        alert("Please enter your mobile number");
        return false;
    } else {
        var regex = /^[1-9]\d{9}$/;
        if(regex.test(mobile) === false) {
            alert("Please enter a valid 10 digit mobile number");
            return false;
        } else{
            mobileErr = false;
        }
    }

    // Validate email address
    if(email == "") {
        alert( "Please enter your email address");
        return false;
    } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) {
            alert( "Please enter a valid email address");
            return false;
        } else{
            emailErr = false;
        }
    }

    // Validate name
    if(name == "") {
        alert("Please enter your name");
        return false;
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(name) === false) {
          alert("Please enter a valid name");
          return false;
        } else {
            nameErr = false;
        }

        cookievalue = document.RegForm.Name.value;
        document.cookie = "name=" + cookievalue;
    }
    
    
    if(phone == "") {
        alert("Please enter your Mobile number");
    } else {
        var regex = /^[1-9]\d{9}$/;
        if(regex.test(mobile) === false) {
            alert( "Please enter a valid 10 digit mobile number");
            return false;
        } else{
            mobileErr = false;
        }
    }

    if(address == "") {
        alert( "Please Enter Personal Address");
        return false;
    } else {
        countryErr = false;
    }

    if(city == "") {
        alert("Please Enter your City");
        return false;
    } else {
        countryErr = false;
    }
    
    // Validate country
    if(country == "") {
        alert( "Please Enter your country");
        return false;
    } else {
        countryErr = false;
    }

    if(gender == "") {
        alert("Please select your gender");
        return false;
    } else {
        genderErr = false;
    }

    if(day.value == "") {
        alert("Please select day of your Birth");
        return false;
    } else {
        dayErr = false;
    }

    if(month.value == "") {
        alert("Please select month of your Birth");
        return false;
    } else {
        monthErr = false;
    }

    if(year == "") {
        alert("Please Enter your year of Birth");
        return false;
    } else {
        yearErr = false;
    }

    if(nation == "") {
        alert("Please Enter your Nationality");
        return false;
    } else {
        countryErr = false;
    }

    if(pin == "") {
        alert("Please Enter your Area Pin Code");
        return false;
    } else {
        countryErr = false;
    }

    if(!this.form.Checkbox.checked) {
        alert("Please Accept the all terms and conditions");
        form.Checkbox.focus();
        return false;
    } else {
        countryErr = false;
    }
    
    return true;
};
