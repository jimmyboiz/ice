// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTable').DataTable();
});

$(document).ready(function () {
  $('#dataTable2').DataTable();
});

$(document).ready(function () {
  $('#searchTable').DataTable({
    paging: true,
    ordering: true,
    info: true,
    searching: false,
  });
});

$(document).ready(function () {
  $('#watchlist').DataTable({
    paging: false,
    ordering: false,
    info: false,
    searching: false,
  });
});