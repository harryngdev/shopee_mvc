$('#userDropdown-toggle').click(function() {
    $('#userDropdown-menu').toggleClass("show");
});

$('#catDropdown-toggle').click(function() {
    $(this).toggleClass("active");
    $('#catDropdown-menu').toggleClass("show");
});
$('#originDropdown-toggle').click(function() {
    $(this).toggleClass("active");
    $('#originDropdown-menu').toggleClass("show");
});
$('#productDropdown-toggle').click(function() {
    $(this).toggleClass("active");
    $('#productDropdown-menu').toggleClass("show");
});
$('#sliderDropdown-toggle').click(function() {
    $(this).toggleClass("active");
    $('#sliderDropdown-menu').toggleClass("show");
});
$('#siteDropdown-toggle').click(function() {
    $(this).toggleClass("active");
    $('#siteDropdown-menu').toggleClass("show");
});
$('#updatepagesDropdown-toggle').click(function() {
    $(this).toggleClass("active");
    $('#updatepagesDropdown-menu').toggleClass("show");
});

$(document).ready(function() {
    $('#myTable').DataTable();
    $("#myTable").removeClass('dataTable');
    $("#myTable_length").removeClass('dataTables_length');
    $("#myTable_length").addClass('show-control');
    $("#myTable_filter").removeClass('dataTables_filter');
    $("#myTable_filter").addClass('search-control');
    $("#myTable_info").removeClass('dataTables_info');
    $("#myTable_info").addClass('title');
    $("#myTable_paginate").removeClass('dataTables_paginate');
    $("#myTable_paginate").removeClass('paging_simple_numbers');
    $("#myTable_paginate").addClass('page-control');
    
});