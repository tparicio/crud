$(document).ready(function() {
  /*
   * init datatables on users-table
   */
  var table = $('#users-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '/user/page',
      columns: [
          { data: 'id', name: 'id' },
          { data: 'username', name: 'username' },
          { data: 'email', name: 'email' },
          { data: 'name', name: 'name' },
          { data: 'last_name', name: 'last_name' },
          { data: 'country', name: 'country' },
          { data: 'created_at', name: 'created_at' },
          { name: 'actions' }
      ],
      columnDefs: [ {
            "targets": -1,
            "data": null,
            "defaultContent": '<a class="edit" alt="edit" title="edit"><i class="fa fa-edit"></i></a>&nbsp;<a class="delete" alt="delete" title="edit"><i class="fa fa-trash-alt"><i></a>'
      } ]
  });

  /*
   * bind table buttons events for handle actions
   */
  $('#users-table tbody')
    // bind edit button to redirect to edit user
    .on( 'click', 'a.edit', function () {
        var data = table.row( $(this).parents('tr') ).data();
        window.location.replace('/user/edit/'+data.id);
    } )
    // bind delete button to show a modal for confirm delete
    .on( 'click', 'a.delete', function () {
          var data = table.row( $(this).parents('tr') ).data();
          $('#confirm_delete #id_replace').html(data.id);
          var url = $('#confirm_delete #action_delete').data('url') + '/' + data.id;
          console.log(url);
          $('#confirm_delete #action_delete').attr('href', url);
          $('#confirm_delete').modal({
            show : true
          });
    } );
})
