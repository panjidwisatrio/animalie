var typeNavigation = $('#type-navigation').val();
var page = 1;

$(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 1) {
        page++;
        if (typeNavigation == 'dashboard' || typeNavigation == 'interestGroup' || typeNavigation == 'tag') {
            var activeSearch = $('#active-search').val();

            if (activeSearch == 'true') {
                loadMoreDataSearch(page);
            } else {
                loadMoreData(page);
            }
        } else if (typeNavigation == 'myprofile' || typeNavigation == 'otherprofile') {
            var myActiveSearch = $('#my-active-search').val();

            if (myActiveSearch == 'true') {
                loadMoreDataUserSearch(page);
            } else {
                loadMoreDataUser(page);
            }
        }
    }
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
                    $('.ajax-load').html("<div class=\"py-6 w-full text-center text-cyan-900 bg-white mb-4 shadow-md rounded-b-xl\"><h1 class=\"text-xl font-semibold text-center\">No more posts found</h1><p class=\"font-medium\">It seems that the post is up, let's go back to the top!</p></div>");
                    return;
                }

                $('.ajax-load').hide();
                $(".post-data").append(data.html);
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
                $(".post-data").append(data.html);
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
                $(".post-data").append(data.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR);
                alert('server not responding...');
            });
    }
}

function loadMoreDataUser(page) {
    var type = $('.my-nav-link-post.active').attr('data-type');
    var userId = $('#post-user-id').val();

    if (type == 'mypost') {
        $.ajax({
            url: '/myProfile/load-more-mypost',
            type: "get",
            data: {
                page: page,
                typeNavigation: type,
                userId: userId
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
                $(".post-data").append(data.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR);
                alert('server not responding...');
            });
    } else if (type == 'discussion') {
        $.ajax({
            url: '/myProfile/load-more-discussion',
            type: "get",
            data: {
                page: page,
                typeNavigation: type,
                userId: userId
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
                $(".post-data").append(data.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR);
                alert('server not responding...');
            });
    } else if (type == 'savedpost') {
        $.ajax({
            url: '/myProfile/load-more-savedpost',
            type: "get",
            data: {
                page: page,
                typeNavigation: type,
                userId: userId
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
                $(".post-data").append(data.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR);
                alert('server not responding...');
            });
    }
}

function loadMoreDataSearch(page) {
    var search = $('#simple-search').val();
    var selectedCategory = $('#category-selected').val();
    var selectedTag = $('#tag-selected').val();
    var type = $('.nav-link-post.active').attr('data-type');

    if (type == 'latest') {
        $.ajax({
            url: '/load-more-search',
            type: "get",
            data: {
                page: page,
                search: search,
                typeNavigation: typeNavigation,
                selectedCategory: selectedCategory,
                selectedTag: selectedTag
            },
            beforeSend: function () {
                $('.ajax-load').show();
            }
        })
            .done(function (data) {
                console.log(data);
                if (data.html == "") {
                    $('.ajax-load').html("No more records found");
                    return;
                }

                $('.ajax-load').hide();
                $(".post-data").append(data.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR);
                alert('server not responding...');
            });
    } else if (type == 'popular') {
        $.ajax({
            url: '/load-more-search-popular',
            type: "get",
            data: {
                page: page,
                search: search,
                typeNavigation: typeNavigation,
                selectedCategory: selectedCategory,
                selectedTag: selectedTag
            },
            beforeSend: function () {
                $('.ajax-load').show();
            }
        })
            .done(function (data) {
                console.log(data);
                if (data.html == "") {
                    $('.ajax-load').html("No more records found");
                    return;
                }

                $('.ajax-load').hide();
                $(".post-data").append(data.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR);
                alert('server not responding...');
            });
    } else if (type == 'unanswerd') {
        $.ajax({
            url: '/load-more-search-unanswerd',
            type: "get",
            data: {
                page: page,
                search: search,
                typeNavigation: typeNavigation,
                selectedCategory: selectedCategory,
                selectedTag: selectedTag
            },
            beforeSend: function () {
                $('.ajax-load').show();
            }
        })
            .done(function (data) {
                console.log(data);
                if (data.html == "") {
                    $('.ajax-load').html("No more records found");
                    return;
                }

                $('.ajax-load').hide();
                $(".post-data").append(data.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR);
                alert('server not responding...');
            });
    }

}

function loadMoreDataUserSearch(page) {
    var type = $('.my-nav-link-post.active').attr('data-type');
    var userId = $('#post-user-id').val();

    if (type == 'mypost') {
        $.ajax({
            url: '/myProfile/load-more-search-mypost',
            type: "get",
            data: {
                page: page,
                type: typeNavigation,
                userId: userId
            },
            beforeSend: function () {
                $('.ajax-load').show();
            },
        })
            .done(function (data) {
                console.log(data)
                if (data.html == "") {
                    $('.ajax-load').html("No more records found");
                    return;
                }

                $('.ajax-load').hide();
                $(".post-data").append(data.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR);
                alert('server not responding...');
            });
    } else if (type == 'discussion') {
        $.ajax({
            url: '/myProfile/load-more-search-discussion',
            type: "get",
            data: {
                page: page,
                type: typeNavigation,
                userId: userId
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
                $(".post-data").append(data.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR);
                alert('server not responding...');
            });
    } else if (type == 'savedpost') {
        $.ajax({
            url: '/myProfile/load-more-search-savedpost',
            type: "get",
            data: {
                page: page,
                type: typeNavigation,
                userId: userId
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
                $(".post-data").append(data.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR);
                alert('server not responding...');
            });
    }
}

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

$('#search-post').on('keyup', function () {
    page = 1;
});

$('#my-search-post').on('keyup', function () {
    page = 1;
});