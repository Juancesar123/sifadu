@extends('layouts.app')

@section('css')
    <style>
        .dataTables_wrapper .dt-buttons a.dt-button span {
            vertical-align: middle;
        }
        #selectPointCanvas{
            height: 400px !important;
        }
        .swal-title {
           margin-bottom: 28px !important;
        }
        thead {
            font-weight: bold;
        }
    </style>

    @include('layouts.datatables_css')

    <link rel="stylesheet" href="{{asset('leaflet-1.3/leaflet.css')}}">
    <link href="{{asset('/uxweb-swal/sweetalert.css')}}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Data Sosial</h1>
        <h1 class="pull-right">
            <a id="createMarker" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="#">Tambah Baru</a>
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px;margin-right:5px" href="{{url('petadesa')}}">Kembali</a>
        </h1>
    </section>
    <div class="content">

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <table id="listmarker" class="table table-sm table-striped table-bordered responsive no-wrap" style="width:100%">
                    <thead>
                        <tr>
                            <td>Nama</td>
                            <td>Kategori</td>
                            <td>Keterangan</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        @include('peta.sosial.choose')

        @include('peta.sosial.create')
            
        @include('peta.sosial.edit')
        
        @include('peta.sosial.selectpoint')

    </div>
    
    @endsection
    
    @section('scripts')
    @include('layouts.datatables_js')
    
    <script src="{{asset('/uxweb-swal/sweetalert.min.js')}}"></script>
    <script src="{{asset('/js/jquery.validate.min.js')}}"></script>
    
    <script src="{{asset('leaflet-1.3/leaflet-src.js')}}"></script>
    <script src="{{asset('/js/create.js')}}"></script>

    <script type="text/javascript">
    $(function(){

        let lat = @JSON($lat);
        let lng = @JSON($lng);
        
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        
        var table = $('#listmarker').DataTable({
            dom :'Bfrtip',
            buttons: [
                // 'create', 'export', 'print', 'reset', 
                {
                    text: 'Reload',
                    action: function ( e, dt, node, config ) {
                        dt.ajax.reload();
                    }
                }
            ],
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: '{!! route('msocials.data') !!}',
            columns: [
                { data: 'name', name: 'name' },
                { data: 'category', name: 'category' },
                { data: 'description', name: 'description' },
                { data: 'action', name: 'action',  width: "10%" },
            ],
            drawCallback: function(){
                // $('.imgpathThumb').simplebox();
                deletePoint();
                createPoint();
                editPoint();
                selectCategory();
            }
        });

        function selectPoint(containerForm, elat, elng){
            
            var osmUrl = 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
            osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            osm = L.tileLayer(osmUrl, {
                // maxZoom: 18,
                attribution: osmAttrib
            });

            var container = L.DomUtil.get('selectPointCanvas');
            if(container != null){
                container._leaflet_id = null;
            }

            var map = L.map('selectPointCanvas').setView([parseFloat(lat), parseFloat(lng)], 15).addLayer(osm);

            var layerP = L.layerGroup().addTo(map);

            if (elat){

                layerP.clearLayers();
                
                initMarker([elat,elng])

            } else {
                map.once('click', onMapClick);
            }

            function initMarker(latlng){
                var marker = L.marker(latlng, {
                    draggable: true,
                    riseOnHover: true
                })
                
                marker.addTo(layerP)
                    .bindPopup(latlng.toString()).openPopup()   

                marker.on("dragend", function (ev) {
                    var chagedPos = ev.target.getLatLng();
                    this.bindPopup(chagedPos.toString()).openPopup();
                    setVal(this._latlng.lat.toFixed(8) , this._latlng.lng.toFixed(8), containerForm)
                });
            }

            function onMapClick(e) {

                setVal(e.latlng.lat.toFixed(8) , e.latlng.lng.toFixed(8), containerForm)
                initMarker(e.latlng)

            }
            
            function setVal(lat,lng, containerForm){
                $("#"+containerForm+"Lat").val(lat)
                $("#"+containerForm+"Lng").val(lng)
            }

            $("#okPointModal").click(function(e){
                $("#selectPointModal").modal('hide');
                $("#"+containerForm+"MarkerModal").modal('show')
                layerP.clearLayers();
                containerForm = null
            })
        }

        function createPoint(){
            $("#createMarker").click(function(e){
                e.preventDefault();

                $("#chooseModal").modal('show')

                $('#chooseCat').click(function(e){
                    e.preventDefault()
                    es = $('#selectedCat').val()
                    if (es !== 'Bencana Alam'){
                        $('#createSubCat').val(es);
                        $("#chooseModal").modal('hide')
                        $("#createMarkerModal").modal('show')
                        $("#viewSelectPoint").click(function(e){
                            $("#createMarkerModal").modal('hide')
                            e.preventDefault();
                            $("#selectPointModal").modal('show');
                            setTimeout(function(){
                                selectPoint('create')
                            },500)
                        })
                    } else {
                        window.location.href = '/customDatas/creates/'+'msocials_Data Sosial_Bencana Alam'
                    }

                })

            });
        
            $("#createSave").click(function(){
                var form = $('#createForm')[0];
                fd = new FormData(form);

                $("#createForm").validate({
                    ignore: '*:not([name])', 
                    debug: true,
                    submitHandler: function () {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "{{route('msocials.store')}}",
                            method: 'POST',
                            data: fd,
                            dataType: 'JSON',
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function (response) {
                                $("#createMarkerModal").modal('hide')
                                $('#createForm').trigger("reset");
                                table.ajax.reload();
                                swal('',{
                                    title: "Marker Berhasil Dibuat!",
                                    icon: 'success',
                                    buttons: false,
                                    timer: 1000,
                                });
                            },
                            error: function (response){
                                swal('',{
                                    title: response.statusText,
                                    icon: 'error',
                                    text: 'Silahkan hubungi Administrator!',
                                    timer: 5000,
                                });
                            }

                        });
                    }
                });
            });
        }
        
        function redirectEdit(){
            window.location.href == '/customDatas/creates/'+'msocials_Data Sosial_Bencana Alam';
            return 
        }

        function editPoint(){
            
            var arrayEdit = ["#editName", "#editSubCat", "#editLat", "#editLng", "#editDesc"];
            $('input[id^=editMarker]').click(function(e){
                // if (e.target.attributes['data-2'].value == 'Data Sosial'){
                //     e.preventDefault();
                //     console.log('fds')
                //     redirectEdit();
                //     // return false
                // } else {
                    for (let i = 0; i < arrayEdit.length; i++) {
                        $(arrayEdit[i]).val($(this).attr('data-'+(i+1)));
                    }
                    $("#editMarkerModal").modal('show')
                    $("#editSelectPoint").click(function(e){
                        $("#editMarkerModal").modal('hide')
                        e.preventDefault();
                        $("#selectPointModal").modal('show');
                        setTimeout(function(){
                            selectPoint('edit', $("#editLat").val(), $("#editLng").val())
                        },1000)
                    })
                    editUrl = $(this).attr('editUrl')
                // }
            });

            $('#editSave').click(function(){
                
                $('#editForm').validate({
                    submitHandler: function () { 
                        let editData = {
                            'name': $("#editName").val(),
                            'category': $("#editCat").val(),
                            'subcategory': $("#editSubCat").children("option:selected").val(),
                            'lat': $("#editLat").val(),
                            'lng': $("#editLng").val(),
                            'description': $("#editDesc").val()
                        }
                        $.ajax({
                            url: editUrl,
                            type: 'PUT',
                            data: {_token: CSRF_TOKEN, message:editData},
                            dataType: 'JSON',
                            success: function (response) {
                                $("#editMarkerModal").modal('hide');
                                table.ajax.reload();
                                swal('',{
                                    title: "Marker Baru Berhasil Diperbarui!",
                                    icon: 'success',
                                    buttons: false,
                                    timer: 1000,
                                });
                            },
                            error: function (response){
                                swal('',{
                                    title: response.statusText,
                                    icon: 'error',
                                    text: 'Silahkan hubungi Administrator!',
                                    timer: 5000,
                                });
                            }
                        });
                    }
                });
            });
        }

        function deletePoint(){
            $('.deleteMarker').click(function(e){
                e.preventDefault();
                deleteUrl = $(this).attr('deleteUrl');
                swal({
                    title: "Hapus marker?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    if(!willDelete){
                        swal.close();
                    } else {
                        $.ajax({
                            url: deleteUrl,
                            type: 'DELETE',
                            data: { _token: CSRF_TOKEN},
                            success: function (response) {
                                $("#editMarkerModal").modal('hide');
                                table.ajax.reload();
                                swal('',{
                                    title: "Marker Berhasil dihapus!",
                                    icon: 'success',
                                    buttons: false,
                                    timer: 1000,
                                });
                            },
                            error: function (response){
                                swal('',{
                                    title: response.statusText,
                                    icon: 'error',
                                    text: 'Silahkan hubungi Administrator!',
                                    timer: 5000,
                                });
                            }
                        });
                    }
                });
            });
        }

        function selectCategory(){
            $('#createCat, #editCat').on('change', function(){
                $('#createSubCat, #editSubCat').empty();
                $('#createMarkerModal').hasClass('in') ? (val = $('#createCat').val(), sub = $('#createSubCat')) : (val = $('#editCat').val(), sub = $('#editSubCat'));
                
                $.ajax({
                    url: "msocial/select/"+val,
                    type: 'GET',
                    data: { _token: CSRF_TOKEN},
                    success: function (response) {
                        sub.empty();
                        response.map( e => {
                            if (e == null){
                                sub.prop('disabled', true);
                            } else {
                                sub.append(`<option value=${e}>${e}</option>`)
                            }
                        })
                    },
                    error: function (response){
                        sub.empty()
                        sub.prop('disabled', true);
                    }
                });
            })
        }
    });
    </script>
@endsection