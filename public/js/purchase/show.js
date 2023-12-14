function btnCheckout() {
    var alamat = $("#alamat").val();
    var kecamatan = $("#kecamatan").val();
    var kabupaten = $("#kabupaten").val();
    var kode_pos = $("#kode_pos").val();

    if (alamat == "" || kecamatan == "" || kabupaten == "" || kode_pos == "") {
        swal({
            title: "Alamat Belum Diisi !",
            text: "Silahkan Lengkapi Alamat Sebelum Checkout !",
            type: "info",
            width: "50rem",
        });
    } else {
        swal({
            title: "Alamat Sudah Benar ?",
            text: "Anda Tidak Akan Dapat Mengubahnya Setelah Checkout!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Checkout !",
            width: "50rem",
        }).then((result) => {
            if (result.value === true) {
                $("#submit-order").submit();
            } else {
                // swal("Cancelled Successfully");
            }
        });
    }
}
