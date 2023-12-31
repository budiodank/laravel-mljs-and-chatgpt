@extends('layouts.app')

@section('nav-chatgpt') active @endsection
@section('content')
<div class="card">
    <div class="card-header">ChatGPT</div>
    <div class="card-body">
        <div class="direct-chat-messages" id="message-chatgpt">

        </div>
    </div>

    <div class="card-footer">
        <form action="#" method="post">
            <div class="input-group">
                <input type="text" id="message" name="message" placeholder="Ask something ..." class="form-control">
                <span class="input-group-append">
                    <button type="button" class="btn btn-primary" id="btn-send" onclick="askChatGPT(this)">Send
                        <div class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts-js')
<script>
    const month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    $(document).ready(function() {
        var messageInput = document.getElementById('message');

        // Add an event listener to capture the Enter key press
        messageInput.addEventListener('keydown', function(e) {
            // Check if the pressed key is Enter (key code 13)
            if (e.keyCode === 13) {
                // Prevent the default behavior of the Enter key (form submission)
                e.preventDefault();

                $("#btn-send").click();
            }
        });
    });

    function askChatGPT(e) {
        const d = new Date();
        let day = d.getDate();
        let year = d.getFullYear();
        let nameMonth = month[d.getMonth()];
        let hour = d.getHours();
        let minutes = d.getMinutes();
        let message = $('#message').val()
        if (message == "") {
            return Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please ask something!',
            })
        }

        $(e).prop('disabled', true)
        $(e).find('.spinner-border').removeClass('d-none')

        html = '<div class="direct-chat-msg">' +
            '<div class="direct-chat-infos clearfix">' +
            '<span class="direct-chat-name float-left">You</span>' +
            '<span class="direct-chat-timestamp float-right">' + day + ' ' + nameMonth + ' ' + hour + ':' + minutes + '</span>' +
            '</div>' +
            '<div class="direct-chat-img text-center mt-1">' +
            '<i class="fa fa-user"></i>' +
            '</div>' +
            '<div class="direct-chat-text">' +
            message +
            '</div>' +
            '</div>'

        $('#message-chatgpt').append(html)

        $('#message').val('')

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ route('chatgpt.ask') }}`,
            data: {
                message: message
            },
            dataType: 'json',
            success: function(res) {

                html = '<div class="direct-chat-msg right">' +
                    '<div class="direct-chat-infos clearfix">' +
                    '<span class="direct-chat-name float-right">ChatGPT</span>' +
                    '<span class="direct-chat-timestamp float-left">' + day + ' ' + nameMonth + ' ' + hour + ':' + minutes + '</span>' +
                    '</div>' +
                    '<div class="direct-chat-img text-center mt-1">' +
                    '<i class="fa fa-comments"></i>' +
                    '</div>' +
                    '<div class="direct-chat-text">' +
                    res +
                    '</div>' +
                    '</div>'

                $('#message-chatgpt').append(html);
                stopLoading(e)
            },
            error: function(xhr, status, error) {
                let errorResponse = JSON.parse(xhr.responseText);
                let errorMessages = errorResponse.error;
                let errorMessage = errorMessages;

                if (errorResponse.message == 'Validation Error') {
                    errorMessage = "Validation error: ";
                    for (let key in errorMessages) {
                        if (errorMessages.hasOwnProperty(key)) {
                            errorMessage += errorMessages[key][0] + "\n";
                        }
                    }
                } else if (xhr.status === 401) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: errorResponse.message + '. Please login again.'
                    })
                    window.location.href = "/admin/login";
                    return;
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Opps...',
                    text: errorMessage
                })
                stopLoading(e)
            }
        });
    }


    function stopLoading(e) {
        $(e).prop('disabled', false)
        $(e).find('.spinner-border').addClass('d-none')
    }
</script>
@endpush