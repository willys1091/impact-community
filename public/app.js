$(document).ajaxStart(function() { Pace.restart(); });

$(document).ready(function() {

	window.setTimeout(function() {
		$(".alert-auto").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove();
		});
	}, 3000);
	bsCustomFileInput.init();

	$('.select2').select2();

	$('.select2bs4').select2({
		theme: 'bootstrap4'
	});

	$('.summernoteLarge').summernote({height: 400});
	$('.summernote').summernote({height: 200});

	$('#datemask').inputmask('dd/mm/yyyy', {
		'placeholder': 'dd/mm/yyyy'
	});

	$('#datemask2').inputmask('mm/dd/yyyy', {
		'placeholder': 'mm/dd/yyyy'
	});

	$('#daterange-btn').daterangepicker({
		ranges: {
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			'This Month': [moment().startOf('month'), moment().endOf('month')],
			'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
				'month').endOf('month')]
		},
		startDate: moment().subtract(29, 'days'),
		endDate: moment()
	},
		function (start, end) {
			$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
				'MMMM D, YYYY'))
		}
	);

	$('[data-mask]').inputmask();

	$('.duallistbox').bootstrapDualListbox();


	$('.my-colorpicker1').colorpicker();

	$('.my-colorpicker2').colorpicker();

	$('.my-colorpicker2').on('colorpickerChange', function (event) {
		$('.my-colorpicker2 .fa-square').css('color', event.color.toString());
	});

	$("input[data-bootstrap-switch]").each(function () {
		$(this).bootstrapSwitch('state', $(this).prop('checked'));
	});


	// ISSUES BOARD HANDLER
	$(function () {
		//"use strict";
		//jQuery UI sortable for the todo list
		$(".todo-list").sortable({
		  placeholder: "sort-highlight",
	      connectWith: ".todo-list",
		  handle: ".handle",
		  forcePlaceholderSize: true,
		  zIndex: 999999,
	      update: function (event, ui) {
	          var issueid = ui.item.context.id;
	          //var newstatus = ui.item.context.closest('.todo-list').id;
			  var newstatus = ui.item.context.parentElement.id;
	          var formData = {issueid:issueid,status:newstatus};
	          //alert(newstatus);
	          $.ajax({
	              data: formData,
	              type: 'POST',
	              url: 'index.php?qa=updateIssueStatus'
	          });

	      }
		});
	});


	// LOAD JQUERY KNOB
	$(function() {
		$(".knob").knob({
			draw : function () {
				// "tron" case
				if(this.$.data('skin') == 'tron') {

					var a = this.angle(this.cv)  // Angle
						, sa = this.startAngle          // Previous start angle
						, sat = this.startAngle         // Start angle
						, ea                            // Previous end angle
						, eat = sat + a                 // End angle
						, r = true;

					this.g.lineWidth = this.lineWidth;

					this.o.cursor
						&& (sat = eat - 0.3)
						&& (eat = eat + 0.3);

					if (this.o.displayPrevious) {
						ea = this.startAngle + this.angle(this.value);
						this.o.cursor
							&& (sa = ea - 0.3)
							&& (ea = ea + 0.3);
						this.g.beginPath();
						this.g.strokeStyle = this.previousColor;
						this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
						this.g.stroke();
					}

					this.g.beginPath();
					this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
					this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
					this.g.stroke();

					this.g.lineWidth = 2;
					this.g.beginPath();
					this.g.strokeStyle = this.o.fgColor;
					this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
					this.g.stroke();
					return false;
				}
			}
		});
	});
});

var myRefreshTimeout;

function startAutorefresh(refreshPeriod) {
	myRefreshTimeout = setTimeout("window.location.reload();",refreshPeriod);
}

function stopAutorefresh() {
	clearTimeout(myRefreshTimeout);
	window.location.hash = 'stop'
}

function showM(url) {

	$('.modal-content').empty();

	$('.modal-content').load(url);
	$('#myModal').modal({
		backdrop:'static',
		show:true
	});
	stopAutorefresh();
}

function goBack() {
    window.history.back()
}

function autoresizeiframe() {
	$(".reply-iframe").load(function() {
		var h = $(this).contents().find("body").height();
		$(this).height( h+15 );
	});
}

$('.ticket-tab-button').click(function(){
	$('.reply-iframe').each(function() {
		$(this).attr("src", $(this).attr("src"));
	});
	autoresizeiframe();
});

/*$('iframe').ready(function(){
	autoresizeiframe();
});*/

// DATATABLE COMPLETE ASC
$("#dt1").dataTable( {
	"dom": '<"top"f>rt<"bottom"><"row dt-margin"<"col-md-6"i><"col-md-6"p><"col-md-12"B>><"clear">',
	"buttons":  [ 'copy', 'csv', 'excel', 'pdf', 'print' ],
	"oLanguage": {
		"sSearch": "<i class='fa fa-search text-gray dTsearch'></i>",
		"sEmptyTable": "No entries to show",
		"sZeroRecords": "Nothing found",
		"sInfoEmpty": "",
	"oPaginate": {
			"sNext": "Next",
			"sPrevious": "Previous",
			"sFirst": "First Page",
			"sLast": "Last Page"
		}
	},
	"order": [[ 0, "asc" ]],
	"columnDefs": [ { "orderable": true, "targets": -1 } ] }
);
// DATATABLE COMPLETE DESC
$("#dt2").dataTable( {
	"dom": '<"top"f>rt<"bottom"><"row dt-margin"<"col-md-6"i><"col-md-6"p><"col-md-12"B>><"clear">',
	"buttons":  [ 'copy', 'csv', 'excel', 'pdf', 'print' ],
	"oLanguage": {
		"sSearch": "<i class='fa fa-search text-gray dTsearch'></i>",
		"sEmptyTable": "No entries to show",
		"sZeroRecords": "Nothing found",
		"sInfoEmpty": "",
	"oPaginate": {
			"sNext": "Next",
			"sPrevious": "Previous",
			"sFirst": "First Page",
			"sLast": "Last Page"
		}
	},
	"order": [[ 0, "desc" ]],
	"columnDefs": [ { "orderable": true, "targets": -1 } ] }
);

// DATATABLE NO BUTTON ASC
$("#dt3").dataTable( {
	"dom": '<"top"f>rt<"bottom"><"row dt-margin"<"col-md-6"i><"col-md-6"p>><"clear">',
	"oLanguage": {
		"sSearch": " <i class='fa fa-search text-gray dTsearch'></i>",
		"sEmptyTable": "No entries to show",
		"sZeroRecords": "Nothing found",
		"sInfoEmpty": "",
	"oPaginate": {
			"sNext": "Next",
			"sPrevious": "Previous",
			"sFirst": "First Page",
			"sLast": "Last Page"
		}
	},
	"order": [[ 0, "asc" ]],
	"columnDefs": [ { "orderable": false, "targets": -1 } ] }
);
// DATATABLE NO BUTTON desc
$("#dt4").dataTable( {
	"dom": '<"top"f>rt<"bottom"><"row dt-margin"<"col-md-6"i><"col-md-6"p>><"clear">',
	"oLanguage": {
		"sSearch": "<i class='fa fa-search text-gray dTsearch'></i>",
		"sEmptyTable": "No entries to show",
		"sZeroRecords": "Nothing found",
		"sInfoEmpty": "",
	"oPaginate": {
			"sNext": "Next",
			"sPrevious": "Previous",
			"sFirst": "First Page",
			"sLast": "Last Page"
		}
	},
	"order": [[ 0, "desc" ]],
	"columnDefs": [ { "orderable": true, "targets": -1 } ] }
);
$("#dt5").dataTable( {
	"dom": '<"top"f>rt<"bottom"><"row dt-margin"<"col-md-6"i><"col-md-6"p>><"clear">',
	"oLanguage": {
		"sSearch": "<i class='fa fa-search text-gray dTsearch'></i>",
		"sEmptyTable": "No entries to show",
		"sZeroRecords": "Nothing found",
		"sInfoEmpty": "",
	"oPaginate": {
			"sNext": "Next",
			"sPrevious": "Previous",
			"sFirst": "First Page",
			"sLast": "Last Page"
		}
	},
	"order": [[ 0, "asc" ]],
	"columnDefs": [ { "orderable": true, "targets": -1 } ] }
);
