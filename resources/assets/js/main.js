$(document).ready(function() {
  $('#users-table').DataTable({
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
          { data: 'updated_at', name: 'updated_at' },
      ]
  });
})
