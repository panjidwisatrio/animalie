$('.posts-target').on('click', '.like-button', function () {
    var id = $(this).data('id');
    var likeCount = $('#like-count-' + id);

    $.ajax({
        type: 'POST',
        url: '/like-post/' + id,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: id
        },
        success: function (response) {
            console.log(response);
            if (response.liked == true) {
                $('#icon-' + id).attr('data-icon', 'ant-design:like-twotone');
                $(this).attr('data-liked', 'true');
            } else {
                $('#icon-' + id).attr('data-icon', 'ant-design:like-outlined');
            }

            $(this).attr('data-liked', response.liked);
            likeCount.html(response.likeCount);
        },
        error: function (error) {
            console.log(error.responseJSON);
        }
    });
});

$('.posts-target').on('click', '.save-button', function () {
    console.log('clicked');
    var id = $(this).data('id');

    $.ajax({
        type: 'POST',
        url: '/saved-post/' + id,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: id
        },
        success: function (response) {
            console.log(response);
            if (response.saved == true) {
                $('#icon-save-' + id).attr('data-icon', 'ic:twotone-bookmark');
                $(this).attr('data-saved', 'true');
            } else {
                $('#icon-save-' + id).attr('data-icon', 'ic:twotone-bookmark-border');
            }

            $(this).attr('data-saved', response.saved);
        },
        error: function (error, response) {
            console.log(response);
            console.log(error.responseJSON);
        }
    });
});

$('.my-post-target').on('click', '.like-button', function () {
    var id = $(this).data('id');
    var likeCount = $('#like-count-' + id);

    $.ajax({
        type: 'POST',
        url: '/like-post/' + id,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: id
        },
        success: function (response) {
            if (response.liked == true) {
                $('#icon-' + id).attr('data-icon', 'ant-design:like-twotone');
                $(this).attr('data-liked', 'true');
            } else {
                $('#icon-' + id).attr('data-icon', 'ant-design:like-outlined');
            }

            $(this).attr('data-liked', response.liked);
            likeCount.html(response.likeCount);
        },
        error: function (error) {
            console.log(error.responseJSON);
        }
    });
});

$('.my-post-target').on('click', '.save-button', function () {
    console.log('clicked');
    var id = $(this).data('id');

    $.ajax({
        type: 'POST',
        url: '/saved-post/' + id,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: id
        },
        success: function (response) {
            console.log(response);
            if (response.saved == true) {
                $('#icon-save-' + id).attr('data-icon', 'ic:twotone-bookmark');
                $(this).attr('data-saved', 'true');
            } else {
                $('#icon-save-' + id).attr('data-icon', 'ic:twotone-bookmark-border');
            }

            $(this).attr('data-saved', response.saved);
        },
        error: function (error, response) {
            console.log(response);
            console.log(error.responseJSON);
        }
    });
});

$('.my-post-target').on('click', '#delete-post', function () {
    var slug = $('.delete-button').attr('data-slug');

    $.ajax({
        type: 'DELETE',
        url: '/post/' + slug + '/delete',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $('.my-post-target').load(location.href + ' .my-post-target');
        },
        error: function (error, response) {
            console.log(response);
            console.log(error.responseJSON);
        }
    });
});