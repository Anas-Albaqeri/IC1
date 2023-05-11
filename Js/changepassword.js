$(document).ready(function() {
	// Validate form on submit
	$('#change-password-form').submit(function(event) {
		event.preventDefault();

		var oldPassword = $('#old-password').val();
		var newPassword = $('#new-password').val();
		var confirmPassword = $('#confirm-password').val();

		// Check if new passwords match
		if (newPassword !== confirmPassword) {
			alert('New passwords do not match');
			return;
		}

		// Make AJAX request to update password
		$.ajax({
			url: 'BE/change_password.php',
			method: 'POST',
			data: {
				oldPassword: oldPassword,
				newPassword: newPassword
			},
			success: function(response) {
				alert(response.message);
				if (response.success) {
					// Redirect to login page
					window.location.href = 'login.php';
				}
			},
			error: function(xhr, status, error) {
				alert('Error: ' + error);
			}
		});
	});
});

