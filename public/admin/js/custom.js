$(document).ready(function () {
    var currentDate = new Date();
    var fifthOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 6);

    if (currentDate > fifthOfMonth) {
        // Disable form submission
        $("#transaction_form").submit(function (e) {
            e.preventDefault();
            alert("You can only request between 1st to 5th date of every month");
        });

        // Optionally, you can disable the submit button to provide visual feedback
        $("#transaction_form input[type='submit']").prop("disabled", true);
    }
});
