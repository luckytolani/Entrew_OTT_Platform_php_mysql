function errcheck()
        {
            var reg = location.search.split("?")[1];
            var val = reg.split("=")[1];
            if (val == 'alreadyreg')
            {
                document.write("Already registered");
            }
            if (val == 'newreg')
            {
                document.write("Registered Successfully");
            }
            if (val == 'loginfail')
            {
                document.write("Username or password is incorrect");
            }
            if (val == 'permit')
            {
                alert("You don't have required permissions");
            }
        }