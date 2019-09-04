@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Surat Pengantar KTP
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <div id="printarea">
                        @include('suratpengantarktps.show_fields')
                    </div>
                    <a href="{!! route('suratpengantarktps.index') !!}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" id="cetak"><i class="fa fa-print"></i> Cetak</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
$('document').ready(function(){
    $("#cetak").click(function(){
        printDiv()
    })
})
function printDiv() 
{

  var divToPrint=document.getElementById('printarea');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}
</script>
@endsection