<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Chat</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script>
        window.Laravel = <?php echo json_encode([
	'csrfToken' => csrf_token(),
]); ?>
</script>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">

<style type="text/css">
        .chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

img.img-circle {
    width: 50px;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.panel-body
{
    overflow-y: auto;
    height: 450px;
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}
a{
  color: white;
}
a:hover{
  color: black;
}

    </style>
</head>
<body>
<div id="appEvent">
    <div class="container">
    <div class="row form-group">
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> {{$data->title}}
                    <div class="pull-right">
                        @if (Auth::user()->role_id==ROLE_UMKM)
                                <a href="{{ route('event.show_akun_umkm',['id'=>$data->id]) }}"><i class="glyphicon glyphicon-th"></i> Kembali</a>
                              @else
                                <a href="{{ route('event.show_akun',['id'=>$data->id]) }}"><i class="glyphicon glyphicon-th"></i> Kembali</a>
                              @endif
                    </div>
                </div>
                <div id="panel-body" class="panel-body body-panel">
                    <ul class="chat">
                      <input id="event_id" type="hidden" value="{{$data->id}}">
                      <input id="event_follower_id" type="hidden" value="{{$check_follow->id}}">
                      <chat-messages-event :messages="messages"></chat-messages-event>
                    </ul>
                </div>
                <div class="panel-footer clearfix">
                    <chat-form-event v-on:messagesentevent="addMessage"></chat-form-event>
                </div>
            </div>
        </div>
    </div>
</div>
  </div>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#panel-body').scrollTop($('#panel-body').prop("scrollHeight"));
      });
    </script>
</body>
</html>

<!-- Page -->
