$(document).ready(function () {
    $(".btn-delete").click(function () {
        var msg;
        if ($(this).attr("data-elem") == "one") {
            msg = "Are you sure you want to delete this task?";
        } else {
            msg = "Are you sure you want to delete all tasks?";
        }

        if (confirm(msg) != true) {
            return false;
        }
    });
});
