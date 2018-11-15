$(document).ready(function () {
	$('#vitacreate').click(function () {
		var ajaxUrl = '<f:uri.action action="createVitaAjax" controller="Member" pageType="2529" arguments="{member:member}"/>';
		var form = $('form');
		$.post(ajaxUrl, form.serialize(), function (response) {
			console.log(response);
		})
	})
});
