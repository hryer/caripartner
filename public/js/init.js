$(document).ready(function(){

	// Navbar starts
	$(".dropdown-button").dropdown();
	// Navbar ends

	// form starts
	$('input.input_text, textarea#textarea1').characterCounter();
	// form ends

	//Modal Starts
    $('.modal-trigger').click(function(event){
        event.preventDefault();

        var postBody = event.target.parentNode.parentNode.childNodes[1].textContent;
        console.log(postBody);
        $('#post-body').val(postBody);

    });

    $('#editModal').modal();

    $('#cancelModal').click(function () {
        $('#editModal').modal('close');
    });
	//Modal Ends
});

