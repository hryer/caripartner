$(document).ready(function(){

	// Navbar starts
	$(".dropdown-button").dropdown();
	// Navbar ends

	// form starts
	$('input.input_text, textarea#textarea1').characterCounter();
	// form ends

	//Modal Starts
    $('#editModal').modal();

    $('#cancelModal').click(function () {
        $('#editModal').modal('close');
    });
	//Modal Ends
});

