$(document).ready(function () {
	// FlashMessage fade out
	$('.typo3-messages').delay(5000).fadeOut();
	//Tooltip initialize
	$('[data-toggle="tooltip"]').tooltip();
	//Initialize Select2 Elements
	$('.select2').select2({
		language: "de"
	});
	
	// Set slimscroll
	$('.sidebar').slimScroll({
		color: '#ffffff',
		railVisible: true,
		alwaysVisible: true
	});

	// Dashboard Layout Select
	$("#js-dashboard-select").on('change', function() {
		if((this.value != 'Standard (20/80)') && (this.value != '80/20') && (this.value != '1 Spaltig')){
			$(".rb2").removeClass('disable');
			$("rb3").removeClass('disable');
		} else {
			$(".rb3").removeClass('disable');
			$(".rb2").addClass('disable');
			if((this.value == '1 Spaltig')) {
				$(".rb3").addClass('disable');
			}
			}

	});

	// Dropdown Button Memberlist change Text
	$("#js-memberlist li a").click(function(){

		$("#js-memberlist-button:first-child").html($(this).text()+' <span class="caret"></span>');

	});

	// Drag & Drop MultiUpload Files
	$('input#js-multiupload').ezdz({
		text: 'Dateien hier her ziehen, oder klicken',
		validators: {
			maxSize: 10485760
		},
		reject: function(file, errors) {
			if (errors.mimeType) {
				$('#mimetypefile').modal('toggle')
			}

			if (errors.maxSize) {
				$('#mimetypefile').modal('toggle')
			}
		}
	});

	// Drag & Drop Upload File
	$('input#js-file-upload,input#js-membershipResignation-upload').ezdz({
		text: 'Datei hier her ziehen, oder klicken',
		validators: {
			maxSize: 10485760
		},
		reject: function(file, errors) {
			if (errors.mimeType) {
				$('#mimetypefile').modal('toggle')
			}

			if (errors.maxSize) {
				$('#mimetypefile').modal('toggle')
			}
		}
	});
	$('input#js-membershipApplication-upload').ezdz({
		text: 'Datei hier her ziehen, oder klicken',
		validators: {
			maxSize: 10485760
		},
		reject: function(file, errors) {
			if (errors.mimeType) {
				$('#mimetypefile').modal('toggle')
			}

			if (errors.maxSize) {
				$('#mimetypefile').modal('toggle')
			}
		}
	});
	$('input#js-memberCopyMandate-upload').ezdz({
		text: 'Datei hier her ziehen, oder klicken',
		validators: {
			maxSize: 10485760
		},
		reject: function(file, errors) {
			if (errors.mimeType) {
				$('#mimetypefile').modal('toggle')
			}

			if (errors.maxSize) {
				$('#mimetypefile').modal('toggle')
			}
		}
	});

	// Drag & Drop Upload image
	$('input#js-image-upload,input#js-memberPhoto-upload').ezdz({
		text: 'Bild hier her ziehen, oder klicken',
		validators: {
			maxSize: 10485760
		},
		reject: function(file, errors) {
			if (errors.mimeType) {
				$('#mimetypeimage').modal('toggle')
			}

			if (errors.maxSize) {
				$('#mimetypeimage').modal('toggle')
			}
		}
	});

	// Member Vita Data Table
	$.fn.dataTable.moment( 'DD.MM.YYYY' );

	$('#membervita').DataTable({
		'paging'      : true,
		'lengthChange': true,
		'searching'   : false,
		'order'       : [[1, 'desc']],
		'ordering'    : true,
		'info'        : true,
		'autoWidth'   : false,
		"columnDefs": [
			{ "orderable": false, "targets": 2 },
			{ "orderable": false, "targets": 3 }
		],
		language: {
			"sEmptyTable":      "Keine Daten in der Tabelle vorhanden",
			"sInfo":            "_START_ bis _END_ von _TOTAL_ Einträgen",
			"sInfoEmpty":       "0 bis 0 von 0 Einträgen",
			"sInfoFiltered":    "(gefiltert von _MAX_ Einträgen)",
			"sInfoPostFix":     "",
			"sInfoThousands":   ".",
			"sLengthMenu":      "_MENU_ Einträge/Seite",
			"sLoadingRecords":  "Wird geladen...",
			"sProcessing":      "Bitte warten...",
			"sSearch":          "Suchen",
			"sZeroRecords":     "Keine Einträge vorhanden.",
			"oPaginate": {
				"sFirst":       "Erste",
				"sPrevious":    "Zurück",
				"sNext":        "Nächste",
				"sLast":        "Letzte"
			},
			"oAria": {
				"sSortAscending":  ": aktivieren, um Spalte aufsteigend zu sortieren",
				"sSortDescending": ": aktivieren, um Spalte absteigend zu sortieren"
			},
			select: {
				rows: {
					_: '%d Zeilen ausgewählt',
					0: 'Zum Auswählen auf eine Zeile klicken',
					1: '1 Zeile ausgewählt'
				}
			}
		}
	});

	// Member Edit History Data Table

	$('#edithistory').DataTable({
		'paging'      : true,
		'lengthChange': true,
		'searching'   : false,
		'order'       : [[0, 'desc']],
		'ordering'    : true,
		'info'        : true,
		'autoWidth'   : false,
		"columnDefs": [
			{ "orderable": false, "targets": 0 },
			{ "orderable": false, "targets": 1 }
		],
		language: {
			"sEmptyTable":      "Keine Daten in der Tabelle vorhanden",
			"sInfo":            "_START_ bis _END_ von _TOTAL_ Einträgen",
			"sInfoEmpty":       "0 bis 0 von 0 Einträgen",
			"sInfoFiltered":    "(gefiltert von _MAX_ Einträgen)",
			"sInfoPostFix":     "",
			"sInfoThousands":   ".",
			"sLengthMenu":      "_MENU_ Einträge/Seite",
			"sLoadingRecords":  "Wird geladen...",
			"sProcessing":      "Bitte warten...",
			"sSearch":          "Suchen",
			"sZeroRecords":     "Keine Einträge vorhanden.",
			"oPaginate": {
				"sFirst":       "Erste",
				"sPrevious":    "Zurück",
				"sNext":        "Nächste",
				"sLast":        "Letzte"
			},
			"oAria": {
				"sSortAscending":  ": aktivieren, um Spalte aufsteigend zu sortieren",
				"sSortDescending": ": aktivieren, um Spalte absteigend zu sortieren"
			},
			select: {
				rows: {
					_: '%d Zeilen ausgewählt',
					0: 'Zum Auswählen auf eine Zeile klicken',
					1: '1 Zeile ausgewählt'
				}
			}
		}
	});

	// Password Generator
	var password;
	$('#passgenbut').click(
		function(){
			// generatinng the password
			password = $.passGen({'length' : 12});

			// displaying the value
			$('input[type=password]').val(password);
			$("#modalmessage").html(password);
			$('#passModal').modal("show");

		}
	);

	// Admin Groups show if checkbox is checked
	if ($('#adminrights').is(':checked')){
		$('#admingroups').toggle(this.checked);
	}

    // Birthday Date
	$("#birthdate, #weddingdate, #entrydate, #leavingdate, #mandantevalid, #paymentdate").datetimepicker({
		format: "DD.MM.YYYY",
		locale: "de"
	});
/*
	$("#datetime1").datetimepicker({

		format: "DD.MM.YYYY HH:mm",
		locale: "de",
		stepping: TYPO3.settings.TS["bookingIntervall"],
		sideBySide: true
	});*/

// Global chart settings
 Chart.defaults.global.elements.point.radius = 4;
 Chart.defaults.global.elements.point.hoverRadius = 4;



	// Show Password Function
	$(".fa-eye").bind("mousedown touchstart", function () {
		$("#pass").attr('type', 'text');
	}).bind("mouseup touchend", function () {
		$("#pass").attr('type', 'password');
	}).mouseout(function () {
		$("#pass").attr('type', 'password');
	});


});
