$('#set-gpa').DataTable({
    "ajax": window.location.origin + '/gpa',
    "columns": [{
        "data": "name"
    }, {
        "data": "position"
    }, {
        "data": "office"
    }, {
        "data": "extn"
    }, {
        "data": "start_date"
    }, {
        "data": "salary"
    }]
});
//
// $(document).ready(function(){
//      call_gpa();   //pemanggilan fungsi tampil barang.
//
//      $('#set-gpa').DataTable();
//
//      //fungsi tampil barang
//      function call_gpa(){
//          $.ajax({
//              type  : 'ajax',
//              url   : document.baseURI + '/gpa',
//              async : false,
//              dataType : 'json',
//              success : function(data){
//                  var html = '';
//                  var i;
//                  for(i=0; i<data.length; i++){
//                      html += '<tr>'+
//                              '<td>'+data[i].idP+'</td>'+
//
//                              '</tr>';
//                  }
//                  $('#show_data').html(html);
//              }
//
//          });
//      }
//
//  });
