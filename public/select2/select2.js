$(document).ready(function () {
    $(".js-select").select2();
});
// digunakan mendisable select
// $(".js-programmatic-disable").on("click", function () {
//     $(".js-example-disabled").prop("disabled", true);
//     $(".js-example-disabled-multi").prop("disabled", true);
//   });

$(function () {
    // bind change event to select
    $("#select").on("change", function () {
        var url = $(this).val(); // get selected value
        if (url) {
            // require a URL
            window.location = url; // redirect
        }
        return false;
    });
});

$(".js-select").select2({
    ajax: {
        url: "/recruitment",
        cache: false,
    },
});

function format(state) {
    if (!state.id) return state.text; // optgroup
    return state.text + " <i class='info'>link</i>";
}

var select2 = $("#select")
    .select2({
        formatResult: format,
        formatSelection: format,
        escapeMarkup: function (m) {
            return m;
        },
    })
    .data("select2");

select2.onSelect = (function (fn) {
    return function (data, options) {
        var target;

        if (options != null) {
            target = $(options.target);
        }

        if (target && target.hasClass("info")) {
            alert("click!");
        } else {
            return fn.apply(this, arguments);
        }
    };
})(select2.onSelect);

$("select").select2({
    dir: "rtl",
    dropdownAutoWidth: true,
    dropdownParent: $("#parent"),
});
