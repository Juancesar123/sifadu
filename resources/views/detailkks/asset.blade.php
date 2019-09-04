@section('scripts')
	@parent
	<script src="{{ asset('vendor/global/js/bootstrap3-typeahead.min.js') }}" type="text/javascript"></script>
	<script type="text/javascript">
		$(function(){
			function initTypeaheadDatapenduduk(className) {
				$('.'+className).typeahead({
					name: 'datapenduduk',
					source: function(query, process){
						$.ajax({
							url: "{{ route('cari.datapenduduk') }}",
							type: 'GET',
							dataType: 'json',
							data: {search: query},
						})
						.done(function(datas) {
							master = [];
							map = {};
							$.each(datas, function(i, item) {
								map[item.nama_lengkap] = item;
								master.push(item.nama_lengkap);
							});
							process(master);
						})
						.fail(function() {
							console.log("error");
						});
						
					},
					minLength: 2, 
					items: 20,
					updater: function (item) {
						this.$element.closest('td').find('input.nik').val(map[item].nik);
						return item;
					},
					matcher: function(item) {
						if (item.toLowerCase()) {
							return true;
						}
					}, 
					highlighter: function(data) {
						var master = map[data];
						var query = this.query.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, '\\$&');
						var highlighted_label = data.replace(new RegExp('(' + query + ')', 'ig'), function ($1, match) {
						    return '<strong>' + match + '</strong>'
						});
						var view_label = highlighted_label; //+ ' (' + master.kode_makanan + ')'
						return view_label;
					}
				});
			}

	

			function updateDisabledButton(id) {
				$table = $('.table#'+id+' tbody');
				$btn = $table.find('tr').find('button.btn-danger[data-status=1]');				
				$btn.attr('disabled', true);
				$btn = $table.find('tr').find('button.btn-danger[data-status=0]');
				$btn.attr('disabled', false);
			}

			var updateBtnRemove = function(id) {
				$table = $('.table#'+id+' tbody');
				$tr    = $table.find('tr').find('.btn.red');
				if ($table.children('tr').length > 1) {
					$tr.removeAttr('disabled');
				} else {
					$tr.attr('disabled', true);
				}
				$table.find('tr:not(:last)').find('.btn.blue').css('display', 'none');
				$table.find('tr:last').find('.btn.blue').css('display', '');
				
				$table.find('tr:not(:last)').find('.btn.red').addClass('btn-block');
				$table.find('tr:last').find('.btn.red').removeClass('btn-block');

				updateDisabledButton(id);		
			}

			function initTableDynamic(id) {
				$('.table#'+id).on('click', '.btn.blue', function(){ //.btn.blue
					if ($(this).closest('tr').is(':last-child')) {
						var currentTr = $(this).closest('tr');
						var cloneTr = currentTr.clone();
						cloneTr.find('input').val('');
						cloneTr.find('input').removeAttr('readonly');
						cloneTr.find('.form-group').removeClass('has-error');
						cloneTr.find('button.btn.btn-danger').removeAttr('data-status');
						cloneTr.find('button.btn.btn-danger').removeAttr('disabled');
						currentTr.after(cloneTr);
					}

					updateBtnRemove(id);
					initTypeaheadDatapenduduk('datapenduduk');
				});
			}

			function initDeleteRowTable(id) {
				$('.table#'+id).on('click', '.btn.red', function(){
					if($('.table#'+id+' tbody').children('tr').length != 1) {
						$(this).closest('tr').remove();
					}

					if ($(this).attr('data-status') == '0') {
						$(this).closest('tr').find('input').val('');
					}

					updateBtnRemove(id);
				});
			}

			updateBtnRemove('datapenduduk');
			initTableDynamic('datapenduduk');
			initDeleteRowTable('datapenduduk');
			initTypeaheadDatapenduduk('datapenduduk');
			updateDisabledButton('datapenduduk');
		});
	</script>
@stop