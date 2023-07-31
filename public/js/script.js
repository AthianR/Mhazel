$(document).ready(function () {
    setTimeout(function () {
        $("#alert-success").fadeOut("slow");
    }, 2000);
});

$(document).ready(function () {
    setTimeout(function () {
        $("#alert-error").fadeOut("slow");
    }, 2000);
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

document.getElementById("qty").addEventListener("input", function () {
    var input = this.value;
    if (input < 1) {
        // Tampilkan modal jika nilai kurang dari 0
        var modal = document.getElementById("myModal");
        modal.style.display = "block";
        this.value = 1; // Reset nilai menjadi 0
    }
});

// Tombol "Batal" pada modal
document.getElementById("cancelBtn").addEventListener("click", function () {
    var modal = document.getElementById("myModal");
    modal.style.display = "none"; // Sembunyikan modal jika tombol "Batal" diklik
});

document.getElementById("closeBtn").addEventListener("click", function () {
    var modal = document.getElementById("myModal");
    modal.style.display = "none"; // Sembunyikan modal jika tombol "Batal" diklik
});

document.getElementById("checkAll").addEventListener("change", function () {
    var checkboxes = document.getElementsByClassName("checkSingle");
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = this.checked;
    }
});

// Fungsi untuk mengecek apakah ada setidaknya satu produk yang dipilih pada checkbox
function isAnyCheckboxChecked() {
    var checkboxes = document.getElementsByClassName("checkSingle");
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            return true;
        }
    }
    return false;
}

// Event listener untuk checkbox utama
document.getElementById("checkAll").addEventListener("change", function () {
    var checkboxes = document.getElementsByClassName("checkSingle");
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = this.checked;
    }

    updateCheckoutButton(); // Perbarui status tombol checkout
});

// Event listener untuk checkbox lainnya
var checkboxes = document.getElementsByClassName("checkSingle");
for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].addEventListener("change", updateCheckoutButton);
}

// Fungsi untuk menghitung total harga berdasarkan qty dan harga produk
function updateTotalHarga() {
    var qtyInput = document.getElementById("qty");
    var hargaProduk = parseFloat(
        document.getElementById("hargaProduk").innerText
    );
    var totalHarga = qtyInput.value * hargaProduk;
    document.getElementById("totalHarga").innerText = totalHarga.toFixed(2);
}

// Event listener untuk menghitung total harga saat nilai qty berubah
document.getElementById("qty").addEventListener("input", updateTotalHarga);
