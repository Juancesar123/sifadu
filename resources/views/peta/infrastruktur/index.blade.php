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
    <link rel="stylesheet" href="{{asset('leaflet-draw/leaflet.draw.css')}}">
    <link href="{{asset('/uxweb-swal/sweetalert.css')}}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Data Infrastruktur</h1>
        <h1 class="pull-right">
            <a id="createMarker" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="#">Add New</a>
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px;margin-right:5px" href="{{url('petadesa')}}">Back</a>
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

        @include('peta.infrastruktur.create')
            
        @include('peta.infrastruktur.edit')
        
        @include('peta.infrastruktur.selectpoint')

    </div>
    
    @endsection
    
    @section('scripts')
    @include('layouts.datatables_js')
    
    <script src="{{asset('/uxweb-swal/sweetalert.min.js')}}"></script>
    <script src="{{asset('/js/jquery.validate.min.js')}}"></script>
    
    <script src="{{asset('leaflet-1.3/leaflet-src.js')}}"></script>
    <script src="{{asset('leaflet-1.3/leaflet.draw.js')}}"></script>
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
            ajax: '{!! route('minfrastrukturs.data') !!}',
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
                // $("#selectPointModal").modal('show')
                // setTimeout(function(){
                //     selectPoint('edit')
                // },500)
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
            
            var editableLayers = new L.FeatureGroup();
            map.addLayer(editableLayers);

            var drawPluginOptions = {
            position: 'topright',
            draw: {
                polygon: false,
                polyline: true,
                circle: false,
                rectangle: false,
                marker: false
            },
            edit: {
                featureGroup: editableLayers, // REQUIRED
                remove: false,
                edit: {
                selectedPathOptions: {
                    dashArray: '5, 30',
                    fill: true,
                    fillColor: '#fe57a1',
                    fillOpacity: 0.5,
                    // Whether to user the existing layers color
                    maintainColor: true
                }
                },
                poly: {
                icon: new L.DivIcon({
                    iconSize: new L.Point(12, 12),
                    className: 'leaflet-div-icon leaflet-editing-icon my-custom-icon'
                })
                }
            }
            };

            // Initialise the draw control and pass it the FeatureGroup of editable layers
            
            
            var prevVal = $("#"+containerForm+"Line").val()
            
            function swap(array, index1, index2) {
                var temp = array[index1];
                array[index1] = array[index2];
                array[index2] = temp;
            }
            var drawControl = new L.Control.Draw(drawPluginOptions);
            
            $("#okPointModal").prop('disabled', true);
            $('.leaflet-disabled').parent('div').css('display','none')

            //check if existing coordinates available and init existing coordinates
            if(prevVal){

                // disable create new line if existing
                drawPluginOptions.draw.polyline = false
                var drawControlu = new L.Control.Draw(drawPluginOptions);
                map.addControl(drawControlu);

                // check coordinates format
                if (prevVal.includes("type")){
                    rawprevVal = JSON.parse(prevVal)
                    if(rawprevVal['geometry']){
                        rawprevVal = rawprevVal['geometry']['coordinates']
                    } else {
                        rawprevVal = rawprevVal['coordinates']
                    }
                    prevVal = rawprevVal.map(e=>e.join(' ')).join(',')
                }
                latlngs = prevVal.split(',').map(e=>e.split(' '))    
                latlngs.map(e=>swap(e,1,0))
                initPoly(latlngs)
            } else {
                map.addControl(drawControl);
                map.on('draw:created', function(e) {
                    var layer = e.layer;
                    var shape = layer.toGeoJSON()
                    var shape_for_db = JSON.stringify(shape);
                    
                    setVal(shape_for_db, containerForm)
                    editableLayers.addLayer(layer);

                    $('#selectPointModal').modal({keyboard: true}) 
                    $("#okPointModal").prop('disabled', false);
                });
            }
            
            function initPoly(latlngs){
                var polyline = L.polyline(latlngs, {color: 'red'})
                polyline.addTo(editableLayers);
                map.fitBounds(polyline.getBounds());
                editableLayers.addLayer(polyline);
                map.on('draw:editstop', function(e){
                    var shape = polyline.toGeoJSON()
                    var shape_for_db = JSON.stringify(shape);
                    setVal(shape_for_db, containerForm)
                    $("#okPointModal").prop('disabled', false);                    
                })
                map.addLayer(polyline);
            }   
            
            function setVal(arr, containerForm){
                $("#"+containerForm+"Line").val(arr)
            }

            $("#okPointModal").click(function(e){
                $("#selectPointModal").modal('hide');
                $("#"+containerForm+"MarkerModal").modal('show')
                editableLayers.clearLayers();
                containerForm = null
            })
        }

        function createPoint(){
            $("#createMarker").click(function(e){
                e.preventDefault();

                $("#chooseModal").modal('show')
                $("#createMarkerModal").modal('show')
                $("#viewSelectPoint").click(function(e){
                    $("#createMarkerModal").modal('hide')
                    e.preventDefault();
                    $("#selectPointModal").modal('show');
                    setTimeout(function(){
                        selectPoint('create')
                    },500)
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
                            url: "{{route('minfrastrukturs.store')}}",
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
            window.location.href == '/customDatas/creates/'+'minfrastrukturs_Data Infrastruktur_Bencana Alam';
            return 
        }

        function editPoint(){
            
            var arrayEdit = ["#editName", "#editSubCat", "#editLine", "#editDesc"];
            $('input[id^=editMarker]').click(function(e){
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
            });

            $('#editSave').click(function(){
                
                $('#editForm').validate({
                    submitHandler: function () {
                        let editData = {
                            'name': $("#editName").val(),
                            'fitur': $("#editFit").val(),
                            'category': $("#editCat").children("option:selected").val(),
                            'line': $("#editLine").val(),
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
    });
    </script>
@endsection