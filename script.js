$(document).ready(function() {
    // Cek apakah ada konten yang disimpan di localStorage
    var lastActiveContent = localStorage.getItem('lastActiveContent');

    // Sembunyikan semua konten kecuali konten yang sedang aktif
    $('#dashboard, #peminjaman, #riwayat, #stok_buku, #buku, #transaksi, #anggota, #petugas').not(lastActiveContent).hide();

    // Jika ada konten yang disimpan, tampilkan konten tersebut
    if (lastActiveContent) {
        $(lastActiveContent).show();
    } else {
        // Jika tidak ada yang disimpan, tampilkan konten dashboard secara default
        $(".sidebar ul li a[href='#dashboard']").parent().addClass('active');
        $('#dashboard').show();
    }

    // Menangani klik pada item navigasi
    $(".sidebar ul li a").on('click', function(e) {
        e.preventDefault(); // Mencegah tindakan default dari link

        // Menghapus kelas active dari semua item navigasi
        $(".sidebar ul li").removeClass('active');

        // Menambahkan kelas active ke item navigasi yang diklik
        $(this).parent().addClass('active');

        // Mendapatkan id dari konten yang diklik
        var targetContentId = $(this).attr('href');

        // Menyimpan ID konten yang sedang aktif di localStorage
        localStorage.setItem('lastActiveContent', targetContentId);

        // Menampilkan konten yang sesuai dan menyembunyikan yang lainnya
        $('#dashboard, #peminjaman, #riwayat, #stok_buku, #buku, #transaksi, #anggota, #petugas').not(targetContentId).hide();
        $(targetContentId).show();
    });

    // Menandai navigasi yang sesuai dengan konten yang sedang ditampilkan saat pertama kali dimuat
    var activeNavItem = $('.sidebar ul li').find('a[href="' + lastActiveContent + '"]');
    if (activeNavItem.length > 0) {
        activeNavItem.parent().addClass('active');
    }
});

// Script untuk membuka dan menutup sidebar
// Cache the elements to avoid repeated DOM queries
$(document).ready(function() {
    // Sembunyikan tombol tutup saat halaman dimuat
    $('.close-btn').hide();

    // Tambahkan event listener untuk tombol buka
    $('.open-btn').on('click', function() {
        $('.sidebar').addClass('active');
        // Sembunyikan tombol buka
        $(this).hide();
        // Tampilkan tombol tutup
        $('.close-btn').show();
    });

    // Tambahkan event listener untuk tombol tutup
    $('.close-btn').on('click', function() {
        $('.sidebar').removeClass('active');
        // Sembunyikan tombol tutup
        $(this).hide();
        // Tampilkan tombol buka
        $('.open-btn').show();
    });
});

function includeHTML(elementId, fileName) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(elementId).innerHTML = this.responseText;
            // Jalankan JavaScript di file yang dimuat setelah file utama selesai dimuat
            evalScripts(this.responseText);
        }
    };
    xhttp.open("GET", fileName + ".php", true);
    xhttp.send();
}

function evalScripts(html) {
    var scripts = html.match(/<script[^>]*>([\s\S]*?)<\/script>/gi);
    if (scripts) {
        for (var i = 0; i < scripts.length; i++) {
            var scriptContent = scripts[i].replace(/<script.*?>|<\/script>/gi, "");
            eval(scriptContent);
        }
    }
}
includeHTML("dashboard", "DashboardSection/dashboard");
includeHTML("peminjaman", "PeminjamanSection/peminjaman");
includeHTML("riwayat", "RiwayatSection/riwayat");
includeHTML("stok_buku", "StokBukuSection/stok_buku");
includeHTML("buku", "BukuSection/buku");
includeHTML("transaksi", "TransaksiSection/transaksi");
includeHTML("anggota", "AnggotaSection/anggota");
includeHTML("petugas", "PetugasSection/petugas");