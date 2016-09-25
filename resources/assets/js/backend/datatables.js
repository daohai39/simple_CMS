var DataTables = function(selector, options) {
  var language = {
  "decimal" :        ",",
  "emptyTable" :     "Không có dữ liệu trong bảng",
  "info" :           "Thể hiện _START_ đến _END_ trên _TOTAL_ dữ liệu",
  "infoEmpty" :      "Thể hiện 0 đến 0 của 0 dữ liệu",
  "infoFiltered" :   "(Lọc từ _MAX_ tổng số dữ liệu)",
  "thousands" :      ".",
  "lengthMenu" :     "Thể hiện _MENU_ dữ liệu",
  "loadingRecords" : "Đang tải...",
  "processing" :     "Đang tải...",
  "search" :         "Tìm kiếm:",
  "zeroRecords":    "Không có dự liệu nào được phù hợp",
  "paginate": {
      "first":      "Đầu tiên",
      "last":       "Cuối cùng",
      "next":       "Sau",
      "previous":   "Trước"
  },
};

  var options = $.extend(true, {
    processing: true,
    serverSide: true,
    ajax: null,
    language: language,
  }, options);

  return $(selector).DataTable(options);
}


