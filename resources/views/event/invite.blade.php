@extends('layouts.apps.master')

@section('content')
    <!-- Page -->
  <div class="page animsition">
    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Invite User</h3>
        </header>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <h3 class="red" id="alert"></h3>
              <div class="pull-right">
                <button type="button" class="btn btn-success" onclick="inviteAll()">Invite All</button>
                <a href="{{ route('event.show',['id'=>$event_id]) }}" class="btn btn-warning">Kembali</a>
              </div>
            </div>
          </div>
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th class="desktop tablet-l tablet-p mobile-1">Email</th>
                <th class="desktop">Nama</th>
                <th class="desktop">No Telp</th>
                <th class="desktop">Sebagai</th>
                <th class="desktop tablet-l tablet-p mobile-1">Action</th>
                <th class="desktop tablet-l tablet-p mobile-1"><input id="checkAll" type="checkbox"></th>
              </tr>
            </thead>
            <tbody>
            <?php $no = 1;?>
            @foreach($data as $row)
              <tr>
                <td>{{$row->email}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->telp}}</td>
                <td>{{$row->role->nama}}</td>
                <td class="text-nowrap">
                  <a onclick="event.preventDefault(); Confirm({{$row->id}});" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Invite"><i class="icon wb-check" aria-hidden="true"> Invite</i></a>

                  <form id="invite-form-{{$row->id}}" action="{{route('event.doinvite')}}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    <input type="hidden" name="event_id" value="{{$event_id}}">
                    <input type="hidden" name="user_id" value="{{$row->id}}">
                  </form>
                </td>
                <td><input type="checkbox" class="checkUser" name="user_id_yet[]" value="{{$row->id}}"></td>
              </tr>
             @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- End Panel Basic -->
    </div>
  </div>
  <!-- End Page -->
  {{ csrf_field() }}
@endsection

@section('modals')

    <div class="modal fade" id="loading" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
                  role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-body">
                         <h3>Loading.....</h3>
                        </div>
                    </div>
                  </div>

    @endsection

@section('css')
  {{Html::style('remark/assets/vendor/datatables-bootstrap/dataTables.bootstrap.css')}}
  {{Html::style('remark/assets/vendor/datatables-fixedheader/dataTables.fixedHeader.css')}}
  {{Html::style('remark/assets/vendor/datatables-responsive/dataTables.responsive.css')}}
@endsection

@section('js')
  {{Html::script(asset('remark/assets/vendor/datatables/jquery.dataTables.min.js'))}}
  {{Html::script(asset('remark/assets/vendor/datatables-fixedheader/dataTables.fixedHeader.js'))}}
  {{Html::script(asset('remark/assets/vendor/datatables-bootstrap/dataTables.bootstrap.js'))}}
  {{Html::script(asset('remark/assets/vendor/datatables-responsive/dataTables.responsive.js'))}}
  {{Html::script(asset('remark/assets/vendor/datatables-tabletools/dataTables.tableTools.js'))}}
  {{Html::script(asset('remark/assets/js/components/datatables.js'))}}

  <script type="text/javascript">
    var token = $('input[name="_token"]').val();

    function inviteAll()
    {
      var checkedValues = $('input.checkUser:checkbox:checked').map(function() {
    return this.value;
    }).get();
      console.log(checkedValues);
      var event_id = {{$event_id}};
      $.ajax({
        beforeSend: function(){
           $("#loading").modal('show');
         },
         complete: function(){
           $("#loading").modal('hide');
         },
        url: "{{ route('event.doinvite.all') }}",
        method: 'POST',
        dataType:'json',
        data: {_token:token,datas:checkedValues,id_event:event_id}
    }).done(function(response){
      console.log(response);
      if(response.status == 'sukses')
      {
        location.reload(true);
      }
      else{
        $("#alert").html('Gagal invite semua. kesalahan sistem');
      }
    });
    }

    $("#checkAll").change(function() {
    if(this.checked) {
        $('.checkUser').prop('checked',true);
    }
    else
    {
      $('.checkUser').prop('checked',false);
    }
});

    function Confirm(id)
        {
            var id = id;
            swal({
                    title: "Apakah Yakin?",
                    text: "User akan diinvite!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Iya, Invite!",
                    cancelButtonText: "Tidak, Batalkan!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        document.getElementById('invite-form-'+id).submit();
                    } else {
                        swal("Dibatalkan", "User tidak jadi diinvite", "error");
                    }
                });
        }
  </script>
@endsection
