import "./bootstrap";

$(document).ready(function () {
    // jquery validate repeat password
    $("#passwordInputRegister, #repeatPasswordInputRegister").on(
        "keyup",
        function () {
            let passwordInput = $("#passwordInputRegister").val();
            let repeatPasswordInput = $("#repeatPasswordInputRegister").val();
            let repeatPasswordMessage = $("#repeatPasswordMessage");

            if (passwordInput !== "" && repeatPasswordInput !== "") {
                if (passwordInput == repeatPasswordInput) {
                    repeatPasswordMessage
                        .html("Password match")
                        .css("color", "green");
                } else
                    repeatPasswordMessage
                        .html("Password do not match")
                        .css("color", "red");
            }
        }
    );

    // jquery validate slug
    $("#titleInputCreatePost").on("keyup", function () {
        let titleInput = $("#titleInputCreatePost").val();
        let slugInput = $("#slugInputCreatePost");

        if (titleInput !== "") {
            slugInput.val(slugify(titleInput));
        } else {
            slugInput.val("");
        }

        function slugify(str) {
            let slug = str
                .toLowerCase()
                .replace(/ /g, "-")
                .replace(/[^\w-]+/g, "");
            return slug;
        }
    });

    // disabled upload file
    document.addEventListener("trix-file-accept", function (e) {
        e.preventDefault();
    });

    // image file preview
    $("#imageInputEditPost").on("change", function (event) {
        let imagePreview = $("#imagePreviewEditPost");
        imagePreview.attr("src", URL.createObjectURL(event.target.files[0]));
        imagePreview.on("load", function () {
            URL.revokeObjectURL(imagePreview.attr("src")); // free memory
        });
    });
});

// (() => {
//     "use strict";

//     // Graphs
//     const ctx = document.getElementById("myChart");
//     // eslint-disable-next-line no-unused-vars
//     const myChart = new Chart(ctx, {
//         type: "line",
//         data: {
//             labels: [
//                 "Sunday",
//                 "Monday",
//                 "Tuesday",
//                 "Wednesday",
//                 "Thursday",
//                 "Friday",
//                 "Saturday",
//             ],
//             datasets: [
//                 {
//                     data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
//                     lineTension: 0,
//                     backgroundColor: "transparent",
//                     borderColor: "#007bff",
//                     borderWidth: 4,
//                     pointBackgroundColor: "#007bff",
//                 },
//             ],
//         },
//         options: {
//             plugins: {
//                 legend: {
//                     display: false,
//                 },
//                 tooltip: {
//                     boxPadding: 3,
//                 },
//             },
//         },
//     });
// })();
