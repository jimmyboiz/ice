// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});

$(document).ready(function () {
  $('#searchTable').DataTable({
      paging: false,
      ordering: false,
      info: false,
      searching: false,
  });
});