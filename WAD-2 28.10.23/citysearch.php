<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
        $(document).ready(function() {
            const cityInput = $("#input_city");
            const suggestions = $("#suggestions");

            cityInput.on("input", function () {
                const inputValue = cityInput.val().toLowerCase();
                const minLength = 2;

                if (inputValue.length >= minLength) {
                    $.ajax({
                        url: "citysearch-backend.php",
                        method: "GET",
                        data: { prefix: inputValue },
                        success: function (data) {
                            suggestions.html(data);
                            suggestions.show();
                        }
                    });
                } else {
                    suggestions.hide();
                }
            });

            // Close the suggestions box when clicking outside the input field
            $(document).on("click", function (event) {
                if (!$(event.target).is(cityInput)) {
                    suggestions.hide();
                }
            });

            // Handle suggestion item click
            suggestions.on("click", "li", function () {
                cityInput.val($(this).text());
                suggestions.hide();
            });
        });
        </script>
    </head>
    <body>
        <input type="text" id="input_city" placeholder="Enter city...">
        <div id="suggestions"></div>
    </body>
</html>