<script>
    function getData()
            {
                var dataTable;
                  
                    debugger;
                    dataTable = $('#persondatatable').DataTable({
  
                        "ajax": {
                            "url": "/Details/GetAllDetails",
                            "type": "Get",
                            "data":data,
                            "datatype": "json",
                        },  // add this
                            "select": true,
                            "columnDefs": [
                                {
                                    "click": false, "targets": [6],
                                    "width": "25%"
                                }
                            ],
                            "columns": [
                                { "data": "Id", "visible": false },
                                { "data": "Firstname" },
                                { "data": "LastName" },
                                { "data": "PhoneNo" },
                                { "data": "Email" },
                                { "data": "SSN" },
                                 {
                                     "data": "Id", "render": function (data) {
                                         return '<a class="btn btn-primary" style="margin-left:30px"  onclick="editdetails(' + data + ')">Edit</a>   <a class="btn btn-danger" style="margin-left:5px; margin-right:-15x" onclick="deletedetails(' + data + ')">Delete</a>'
  
                                     }
                                 }
                            ],
  
                        } // remove this
                    })
}
</script>

<!-- https://datatables.net/forums/discussion/60385/how-to-refresh-data-table-after-save-or-update -->