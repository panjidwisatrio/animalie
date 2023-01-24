var page = 1;
var typeNavigation = $('#type-navigation').val();

$(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 1) {
        page++;
        loadMoreData(page);
    }
});

$('.nav-link-post').click(function () {
    page = 1;
});

$('.nav-link-post-dropdown').click(function () {
    page = 1;
});

$('.nav-link-categories').click(function () {
    page = 1;
});

$('.nav-link-tag').click(function () {
    page = 1;
});

$('.nav-link-user').click(function () {
    page = 1;
});

$('.nav-link-interest').click(function () {
    page = 1;
});

$('.nav-link-dashboard').click(function () {
    page = 1;
});

$('.nav-link-login').click(function () {
    page = 1;
});

$('#like-button-unauthenticated').click(function () {
    page = 1;
});

function loadMoreData(page) {
    var selectedCategory = $('#category-selected').val();
    var selectedTag = $('#tag-selected').val();
    var type = $('.nav-link-post.active').attr('data-type');

    if (type == 'latest') {
        $.ajax({
            url: '/load-more',
            type: "get",
            data: {
                page: page,
                selectedCategory: selectedCategory,
                selectedTag: selectedTag,
                typeNavigation: typeNavigation
            },
            beforeSend: function () {
                $('.ajax-load').show();
            },
        })
            .done(function (data) {
                if (data.html == "") {
                    $('.ajax-load').html("No more records found");
                    return;
                }

                $('.ajax-load').hide();
                $("#post-data").append(data.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR);
                alert('server not responding...');
            });
    } else if (type == 'popular') {
        $.ajax({
            url: '/load-more-popular',
            type: "get",
            data: {
                page: page,
                selectedCategory: selectedCategory,
                selectedTag: selectedTag,
                typeNavigation: typeNavigation
            },
            beforeSend: function () {
                $('.ajax-load').show();
            },
        })
            .done(function (data) {
                if (data.html == "") {
                    $('.ajax-load').html("No more records found");
                    return;
                }

                $('.ajax-load').hide();
                $("#post-data").append(data.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR);
                alert('server not responding...');
            });
    } else if (type == 'unanswerd') {
        $.ajax({
            url: '/load-more-unanswerd',
            type: "get",
            data: {
                page: page,
                selectedCategory: selectedCategory,
                selectedTag: selectedTag,
                typeNavigation: typeNavigation
            },
            beforeSend: function () {
                $('.ajax-load').show();
            },
        })
            .done(function (data) {
                if (data.html == "") {
                    $('.ajax-load').html("No more records found");
                    return;
                }

                $('.ajax-load').hide();
                $("#post-data").append(data.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR);
                alert('server not responding...');
            });
    }
}