$(document).ready(function(){
    var postId = 0;
    var postBodyElement = null;

	// Navbar starts
	$(".dropdown-button").dropdown();
	// Navbar ends

	// form starts
	$('input.input_text, textarea#textarea1').characterCounter();
	// form ends

	//Modal Starts
    $('.modal-trigger').click(function(event){
        event.preventDefault();

        postBodyElement = event.target.parentNode.parentNode.childNodes[1]
        var postBody = postBodyElement.textContent;
        // var postBody = $(event.relatedTarget).data('post-body');
        var postId = event.target.parentNode.parentNode.parentNode.dataset['postid'];
        console.log(postId);
        $('#post-id').val(postId);
        $('#post-body').val(postBody);

    });

    $('#editModal').modal();

    $('#cancelModal').click(function () {
        $('#editModal').modal('close');
    });

    $('#updateModal').click(function () {
        console.log($('#post-id').val());
        console.log(token);
        console.log($('#post-body').val());

        $.ajax({
            method: 'POST',
            url: urlEdit,
            data: {body: $('#post-body').val(), postId: $('#post-id').val(), _token: token},
            beforeSend: function(){
                console.log("BELUM MASUK");
            },
            success: function(result){ console.log(result['message']); }
        }).done(function (msg) {
            console.log(JSON.stringify(msg));
        })

    });
	//Modal Ends
});

