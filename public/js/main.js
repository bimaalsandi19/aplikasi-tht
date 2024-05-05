// Datatable

$(document).ready(function () {
    $("#myTable").DataTable({
        buttons: [
            {
                extend: "excelHtml5",
            },
        ],
        ordering: false,

        lengthChange: false,
        layout: {
            topStart: "search",
            topEnd: null,
        },
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Cari barang",
        },
    });

    $("#exportButton").on("click", function () {
        $("#myTable").DataTable().button(".buttons-excel").trigger();
    });
    $("#myTable").on("search.dt", function () {
        $("div.dataTables_scrollBody").scrollTop(
            $("div.dataTables_scrollBody").scrollTop() - 1000
        );
    });
});

function filterByCategory(category) {
    var tableRows = document.querySelectorAll("#myTable tbody tr");
    tableRows.forEach(function (row) {
        var categoryColumn = row.querySelector("td:nth-child(4)").textContent;
        if (
            category === "" ||
            category === "Semua" ||
            category === categoryColumn
        ) {
            row.style.display = "table-row";
        } else {
            row.style.display = "none";
        }
    });
}

// preview image
function previewImage() {
    const image = document.querySelector("#image");
    const imgPreview = document.querySelector(".img-preview");
    const fileNameDisplay = document.querySelector(".file-name"); // tambahan

    imgPreview.style.display = "block";

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
        fileNameDisplay.textContent = image.files[0].name; // menampilkan nama file
    };
}

document.getElementById("harga_barang").addEventListener("change", function () {
    var harga_barang = parseInt(this.value); // Mendapatkan nilai harga barang dari input
    var harga_jual = harga_barang + harga_barang * 0.3; // Menghitung harga jual (harga barang + 30%)
    document.getElementById("harga_jual").value = harga_jual; // Menetapkan nilai harga jual pada input harga jual
});

function formatRibuanSatu() {
    let input = document.getElementById("harga_barang");
    // Mengambil nilai input dan menghapus semua koma dari string
    let value = input.value.replace(/\,/g, "");
    // Menggunakan regex untuk menambahkan koma setiap tiga digit dari belakang
    value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    // Menetapkan nilai input yang diformat kembali ke input
    input.value = value;
}

function formatRibuanDua() {
    let input = document.getElementById("harga_jual");
    // Mengambil nilai input dan menghapus semua koma dari string
    let value = input.value.replace(/\,/g, "");
    // Menggunakan regex untuk menambahkan koma setiap tiga digit dari belakang
    value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    // Menetapkan nilai input yang diformat kembali ke input
    input.value = value;
}

// export excel
