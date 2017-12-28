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

        $.ajax({
            method: 'POST',
            url: urlEdit,
            data: {body: $('#post-body').val(), postId: $('#post-id').val(), _token: token},
            beforeSend: function(){
                console.log("BELUM MASUK");
            },
            complete:function(msg){
                if(msg=='200'){
                    console.log("200 om");
                }
                // console.log(postBodyElement);
                // console.log($('#post-body').val());
                // console.log(msg['new_body']);
                $(postBodyElement).text($('#post-body').val());

                $('#editModal').modal('close');
            }
        })

    });
	//Modal Ends

    $('.vote').on('click',function(e){
        e.preventDefault();
        console.log($('#post-id').val());

        var isVote = e.target.previousElementSibling == null;

        $.ajax({
            method: 'POST',
            url: urlVote,
            data: {isVote: isVote,postId: $('#post-id').val(), _token: token}
        }).done(function(){
            
        });
    });
});

