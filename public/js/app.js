function layanan(x) {
    if (x == 1) {
        let hargaAsli = document.querySelector("input.d-none").value;
        let harga = parseInt(hargaAsli);
        harga += 350000;
        let newHarga = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
        }).format(harga);
        document.querySelector("h4.hargasewa").innerHTML = newHarga;
    } else if (x == 2) {
        let hargaAsli = document.querySelector("input.d-none").value;
        let harga = parseInt(hargaAsli);

        harga += 950000;

        let newHarga = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
        }).format(harga);

        alert(
            "Harga All In hanya berlaku dalam kota, untuk tujuan luar kota silahkan konsultasikan dengan customer service kami."
        );
        document.querySelector("h4.hargasewa").innerHTML = newHarga;
    } else {
        let hargaAsli = document.querySelector("input.d-none").value;
        let harga = parseInt(hargaAsli);

        let newHarga = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
        }).format(harga);
        document.querySelector("h4.hargasewa").innerHTML = newHarga;
    }
}
function layananOrder(x) {
    if (x == 1) {
        let hargaAsli = document.querySelector("input.d-none").value;
        let harga = parseInt(hargaAsli);
        let lamaSewa = document.querySelector("#lama_sewa").value;
        harga += 350000;
        harga *= lamaSewa;
        document.querySelector("#total_harga").value = harga;
    } else if (x == 2) {
        let hargaAsli = document.querySelector("input.d-none").value;
        let harga = parseInt(hargaAsli);
        let lamaSewa = document.querySelector("#lama_sewa").value;
        harga += 950000;
        harga *= lamaSewa;
        alert(
            "Harga All In hanya berlaku dalam kota, untuk tujuan luar kota silahkan konsultasikan dengan customer service kami."
        );
        document.querySelector("#total_harga").value = harga;
    } else {
        let lamaSewa = document.querySelector("#lama_sewa").value;
        let hargaAsli = document.querySelector("input.d-none").value;
        let harga = parseInt(hargaAsli);
        // let tes = document.createElement('p');
        // tes.innerText="900000";
        harga *= lamaSewa;
        document.querySelector("#total_harga").value = harga;
    }
}

const buktiBayar = document.querySelector(".bukti_bayar");
buktiBayar.addEventListener("click", function () {
    buktiBayar.classList.toggle("full_image");
    buktiBayar.classList.toggle("thumbnails");
    console.log("test");
});
