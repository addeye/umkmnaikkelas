@extends('layouts.apps.master')

@section('content')
    <!-- Page -->
  <div class="page animsition">
    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="text-left">
              <a href="{{route('info-pasar.list')}}" class="btn btn-lg btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Kembali"><i class="icon wb-reply" aria-hidden="true"></i></a>
            </div>
          <div class="panel-actions">            
            <div class="pull-left margin-right-20">
            <input type="checkbox" id="inputBasicOn" name="inputiCheckBasicCheckboxes" data-plugin="switchery"
            {{$data->status?'checked':''}} />
            </div>
          <label class="padding-top-3" for="inputBasicOn">Publish</label>
          </div>
          <h3 class="panel-title"></h3>
        </header>
        <div class="panel-body">
          <div class="media-body">
              <h4 class="media-heading"><span>{{$data->user->name}}</span>
              </h4>
              <small>{{$data->textdate}}</small>
              <div class="profile-brief">
                  <div class="media">
                      <a class="media-left">
                          <img class="media-object" src="{{asset('uploads/informasi_pasar/'.$data->image)}}" alt="...">
                      </a>
                      <div class="media-body padding-left-20">
                          <h4 class="media-heading">{{$data->judul}}</h4>
                          <p>{{$data->keterangan}}</p>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>      
      <!-- End Panel Basic -->
    </div>
  </div>
  <!-- End Page -->
  <input type="hidden" id="url" value="{{route('info-pasar.doUpdate',['id'=>$data->id])}}">
  {{ csrf_field() }}
@endsection

@section('js')
<script type="text/javascript">
var url = $('#url').val();
var token = $('input[name=_token]').val();
  $("#inputBasicOn").change(function() {
    if(this.checked) {
        validasi(1);
    }
    else
    {
      validasi(0);
    }
});

  function validasi(val)
  {
    $.ajax({
        method: "PUT",
        url: url,
        data: { _token:token,status: val }
      })
        .done(function( msg ) {
            console.log(msg);
        });
  }
</script>
@endsection 
