//Tool Tip
$('[title]').tooltip();

//Notification
function notification(message) {
	if (message == 'Error!') {
		iosOverlay({
			text : message,
			duration : 2e3,
			icon : "assets/img/cross.png"
		});
	}
	if (message == 'Success!') {
		iosOverlay({
			text : message,
			duration : 2e3,
			icon : "assets/img/check.png"
		});
	}
	return false;
};

//Confirm Modal
function confirmModal(msg, url) {
	if ($("#myModal").length > 0) {
		$("#myModal").remove();
	}
	var divModal = null;
	divModal = $('<div id="myModal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade"/>');
	divModal.append('<div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title">Konfirmasi</h4></div><div class="modal-body">' + msg + '</div><div class="modal-footer"><button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button><a href="' + url + '" class="btn btn-primary">Ya</a></div></div></div>');
	$('body').append(divModal);
	$('#myModal').modal('show');
	return false;
}