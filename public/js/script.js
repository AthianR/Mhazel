$(document).ready(function () {
    setTimeout(function () {
        $("#alert-success").fadeOut("slow");
    }, 2000); // Ubah angka 3000 menjadi waktu yang diinginkan dalam milidetik (misalnya 5000 untuk 5 detik)
});

$(document).ready(function () {
    setTimeout(function () {
        $("#alert-error").fadeOut("slow");
    }, 2000); // Ubah angka 3000 menjadi waktu yang diinginkan dalam milidetik (misalnya 5000 untuk 5 detik)
});

$(document).ready(function () {
    // Menggunakan class "check-all" untuk checkbox yang ingin diatur
    $(".check-all").click(function () {
        // Mendapatkan status terkini dari checkbox pertama (checkbox1)
        var isChecked = $("#checkbox").prop("checked");

        // Set status yang sama untuk checkbox lainnya (checkbox2 dan checkbox3)
        $(".check-all").not(this).prop("checked", isChecked);
    });

    // Mengatur peristiwa pada checkbox pertama (checkbox1)
    $("#checkbox").click(function () {
        // Mendapatkan status terkini dari checkbox pertama (checkbox1)
        var isChecked = $(this).prop("checked");

        // Set status yang sama untuk checkbox lainnya (checkbox2 dan checkbox3)
        $(".check-all").not(this).prop("checked", isChecked);
    });
});

function goBack() {
    window.history.back();
    disableForwardNavigation();
}

function disableForwardNavigation() {
    if (window.history && window.history.pushState) {
        window.history.pushState(null, null, window.location.href);
        window.onpopstate = function () {
            window.history.pushState(null, null, window.location.href);
        };
    }
}
