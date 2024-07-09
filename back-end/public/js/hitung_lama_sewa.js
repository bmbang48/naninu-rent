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

    var selisihTanggal = Math.round(selisih / hariDalamMillisecond + 1);
    console.log(selisihTanggal);
    // Hasilnya adalah 8 hari
    let lama_sewa = parseInt(valueSelesai - valueMulai + 1);
    lamaSewa.innerText = String(lama_sewa) + " Hari";
    inputLamaSewa.value = parseInt(lama_sewa);
    // console.log(valueMulai);
    // console.log(valueSelesai);
    // console.log(inputLamaSewa.value);
    // hitung_total_harga();
}
