$(document).ready(function () {
  // Masking Uang
  // Format mata uang.
  $('.uang').mask('000.000.000.000', {
    reverse: true
  });

  //  Sweet Alert
  const flashData = $('.flash-data').data('flashdata');
  const title = $('title').text();
  //   console.log(flashData);

  if (flashData) {
    Swal.fire({
      title: title,
      text: 'Berhasil ' + flashData,
      icon: 'success'
    });
  }

  $('.tombol-hapus').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
      title: 'Yakin Hapus Data',
      text: "",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus Data!'
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = href;
      }
    })
  });

  //   Tabel Kategori
  $('#tabel-kategori').DataTable({
    responsive: true,
    "lengthMenu": [
      [5, 10, 25, 50],
      [5, 10, 25, 50]
    ],
    "columnDefs": [{
      "searchable": false,
      "orderable": false,
      "targets": 1
    }]
  });

  //   Tabel Produk
  $('#tabel-produk').DataTable({
    responsive: true,
    "lengthMenu": [
      [5, 10, 25, 50],
      [5, 10, 25, 50]
    ],
    "columnDefs": [{
      "searchable": false,
      "orderable": false,
      "targets": 5,
    }]
  });

  //   Tabel Keuangan
  $('#tabel-keuangan').DataTable({
    "responsive": true,
    "lengthMenu": [
      [5, 10, 25, 50],
      [5, 10, 25, 50]
    ],
    "order": [
      [1, 'asc'],
    ],
    "footerCallback": function (row, data, start, end, display) {
      var api = this.api(), data;
      var totalSalary = api.column(2, { page: 'current' }).data().reduce(function (a, b) {
        var numericValue = parseFloat(b.split('.').join(''));
        return a + numericValue;
      }, 0);
      var formattedTotal = totalSalary.toLocaleString('id-ID');
      $(api.column(2).footer()).html(formattedTotal);
    }
  });
});


