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
        return harga;
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
        return harga;
    } else {
        let hargaAsli = document.querySelector("input.d-none").value;
        let harga = parseInt(hargaAsli);

        let newHarga = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
        }).format(harga);
        document.querySelector("h4.hargasewa").innerHTML = newHarga;
        return harga;
    }
}
function layananOrder(x) {
    if (x == 1) {
        let hargaAsli = document.querySelector("input.d-none").value;
        let harga = parseInt(hargaAsli);
        let lamaSewa = document.querySelector("#lama_sewa").value;
        harga += 350000;
        // harga *= lamaSewa;
        document.querySelector("#harga").value = harga;
    } else if (x == 2) {
        let hargaAsli = document.querySelector("input.d-none").value;
        let harga = parseInt(hargaAsli);
        let lamaSewa = document.querySelector("#lama_sewa").value;
        harga += 950000;
        // harga *= lamaSewa;
        alert(
            "Harga All In hanya berlaku dalam kota, untuk tujuan luar kota silahkan konsultasikan dengan customer service kami."
        );
        document.querySelector("#harga").value = harga;
    } else {
        let lamaSewa = document.querySelector("#lama_sewa").value;
        let hargaAsli = document.querySelector("input.d-none").value;
        let harga = parseInt(hargaAsli);
        // let tes = document.createElement('p');
        // tes.innerText="900000";
        // harga *= lamaSewa;
        document.querySelector("#harga").value = harga;
    }
}

const buktiBayar = document.querySelector(".bukti_bayar");
buktiBayar.addEventListener("click", function () {
    buktiBayar.classList.toggle("full_image");
    buktiBayar.classList.toggle("thumbnails");
    console.log("test");
});

function hitung_lama_sewa() {
    const mulaiSewa = document.querySelector("#tgl_sewa");
    const selesaiSewa = document.querySelector("#selesai_sewa");
    let lamaSewa = document.querySelector("p#lama_sewa");
    let inputLamaSewa = document.querySelector(".lama_sewa");
    // console.log(mulaiSewa);
    let valueMulai = mulaiSewa.value.split("-");
    let valueSelesai = selesaiSewa.value.split("-");
    valueMulai = valueMulai[0].concat(valueMulai[1], valueMulai[2]);
    valueSelesai = valueSelesai[0].concat(valueSelesai[1], valueSelesai[2]);
    var tanggal1 = new Date(mulaiSewa.value); // new Date() saja akan menghasilkan tanggal sekarang
    var tanggal2 = new Date(selesaiSewa.value); // format tanggal YYYY-MM-DD, tahun-bulan-hari

    // set jam menjadi jam 12 malam, atau 00
    tanggal1.setHours(0, 0, 0, 0);
    tanggal2.setHours(0, 0, 0, 0);

    var selisih = Math.abs(tanggal1 - tanggal2);
    // Selisih akan dalam millisecond atau mili detik

    var hariDalamMillisecond = 1000 * 60 * 60 * 24; // 1000 * 1 menit * 1 jam * 1 hari

    var lama_sewa = Math.round(selisih / hariDalamMillisecond + 1);
    lamaSewa.innerText = String(lama_sewa) + " Hari";
    inputLamaSewa.value = parseInt(lama_sewa);
    // console.log(valueMulai);
    // console.log(valueSelesai);
    // console.log(inputLamaSewa.value);
    hitung_total_harga();
}

function hitung_total_harga() {
    const mulaiSewa = document.querySelector("#tgl_sewa");
    const selesaiSewa = document.querySelector("#selesai_sewa");
    let lamaSewa = document.querySelector("p#lama_sewa");
    let inputLamaSewa = document.querySelector(".lama_sewa");

    var tanggal1 = new Date(mulaiSewa.value);
    var tanggal2 = new Date(selesaiSewa.value);

    tanggal1.setHours(0, 0, 0, 0);
    tanggal2.setHours(0, 0, 0, 0);

    var selisih = Math.abs(tanggal1 - tanggal2);

    var hariDalamMillisecond = 1000 * 60 * 60 * 24;

    var lama_sewa = Math.round(selisih / hariDalamMillisecond + 1);
    if (isNaN(lama_sewa)) {
        console.log("Lama sewa is " + lama_sewa);
    } else {
        lamaSewa.innerText = String(lama_sewa) + " Hari";
        inputLamaSewa.value = parseInt(lama_sewa);
    }
    // let hargaSewa = document.querySelector("#harga").value;
    let hargaSewa = document.querySelector("h4.hargasewa").innerText;
    let harga = hargaSewa.slice(2);
    let harga1 = harga.split(",");
    harga1 = harga1[0].split(".");
    // let newHarga = String(harga1[0]) + String(harga1[1]) + String(harga);
    let newHarga = "";
    for (let i = 0; i < harga1.length; i++) {
        newHarga = newHarga.concat(String(harga1[i]));
        // console.log(newHarga);
    }
    // harga.substr(",");
    // typeof hargaSewa;
    // console.log(newHarga);
    const totalHarga = parseInt(lama_sewa * newHarga);
    document.querySelector("#total_harga").value = totalHarga;
    console.log(lama_sewa);
    console.log(totalHarga);
}

function copy() {
    const invoice = document.querySelector("span.invoice");
    // console.log(invoice);
    // invoice.select();

    navigator.clipboard.writeText(invoice.innerText);
    // invoice.setSelectionRange(0, 99999); //mobile
    alert(invoice.innerText);
    document.querySelector("span.text-bg-dark").innerText = "Copied";
    // invoice.innerText = "Copied";
}

function copyRekening() {
    const rekening = document.querySelector("span.rekening");
    // console.log(invoice);
    // invoice.select();

    navigator.clipboard.writeText(rekening.innerText);
    // invoice.setSelectionRange(0, 99999); //mobile
    alert(rekening.innerText);
    document.querySelector("span.btn-rekening").innerText = "Copied";
    // invoice.innerText = "Copied";
}
