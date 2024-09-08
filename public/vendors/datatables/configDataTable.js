// Config DataTables 

  $(document).ready(function() {
    $('#dataTable').DataTable({
      "lengthMenu": [5, 15, 25,50,150], // Specify the available page lengths
      "pageLength": 5, // Set the initial number of rows per page
      "searching": true,
      "searchDelay": 500,
      "columns": [
          null, // Cột 1 (Mã)
          { "searchable": true }, // Cột 2 (Nhân viên)
          { "searchable": true }, // Cột 3 (Tổng tiền)
          { "searchable": true }, // Cột 4 (Thời gian)
      ]
    });
  });
