<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <style>
            #popupForm {
                display: none;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                padding: 20px;
                background-color: #fff;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
                z-index: 999;
            }

            #successMessage {
                display: none;
                text-align: center;
                margin-top: 10px;
                color: green;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#btn_showForm').click(function () {
                    $('#popupForm').fadeIn();
                    $('#userForm').fadeIn();
                });
                $('#btn_closeForm').click(function () {
                    $('#popupForm').fadeOut();
                    $('#userForm')[0].reset(); // Clear the form
                    $('#successMessage').hide(); // Hide the success message
                });
            
                $('#userForm').submit(function (e) {
                    e.preventDefault();
                    // Get form data
                    const username = $('#username').val();
                    const age = $('#age').val();
                    const nic = $('#nic').val();
                
                    // Validation (You can add more specific validation as needed)
                    if (username === '' || age === '' || nic === '') {
                        alert('Please fill in all fields.');
                        return;
                    }
                
                    // AJAX to submit the form data
                    $.ajax({
                        type: 'POST',
                        url: 'tablelog-backend.php',
                        data: { username: username, age: age, nic: nic },
                        success: function (data) {
                            // Display success message
                            $('#userForm').fadeOut();
                            $('#successMessage').text('Form submitted successfully!');
                            $('#successMessage').fadeIn();
                        
                            // Add data to the table
                            $('#dataTable').append('<tr><td>' + username + '</td><td>' + age + '</td><td>' + nic + '</td></tr>');
                        
                            // Hide success message after 5 seconds
                            setTimeout(function () {
                                $('#successMessage').fadeOut();
                                $('#popupForm').fadeOut();
                            }, 5000);
                            $('#userForm')[0].reset();
                        }
                    });
                });
            });

        </script>
    </head>
    <body>
        <button id="btn_showForm">Open Form</button>
        <div id="popupForm">
            <form id="userForm">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <br>
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required>
                <br>
                <label for="nic">NIC:</label>
                <input type="text" id="nic" name="nic" required>
                <br>
                <button type="submit">Submit</button>
                <button id="btn_closeForm">Close</button>
            </form>
            <div id="successMessage"></div>
        </div>
        <div id="div_table">
            <table id="dataTable" class="hidden">
            <tr>
                <th >Username</th>
                <th>Age</th>
                <th>NIC</th>
            </tr>
        </div>
    </table>
    </body>
</html>
