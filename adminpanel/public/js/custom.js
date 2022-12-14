var isTriggered = false;
$(document).on("click", ".delete-record", function(e){
	if(!isTriggered){
		e.preventDefault();
		$.confirm({
			title: 'Deleting Record',
			content: 'Are you sute to deete this record?',
			buttons: {
				confirm: function () {
					isTriggered = true;
					e.target.click();
				},
				cancel: function () {
					isTriggered = false;
				}
			}
		});
	}
})