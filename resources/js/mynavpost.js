$('.my-nav-link-post[data-type="mypost"]').attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
var typeNavigation = $('#type-navigation').val();
var activeMyPost = $('.my-nav-link-post[data-type="mypost"]');
var activeDiscussion = $('.my-nav-link-post[data-type="discussion"]');
var activeSavedPost = $('.my-nav-link-post[data-type="savedpost"]');

$('.my-nav-link-post').on('click', function () {
    var type = $(this).attr('data-type');
    var userId = $('#post-user-id').val();

    if (type == 'mypost') {
        $.ajax({
            url: '/myProfile/mypost',
            type: "get",
            data: {
                type: typeNavigation,
                userId: userId
            },
            beforeSend: function () {
                if (typeNavigation == 'myprofile') {
                    $('.my-post-target').html('');
                } else if (typeNavigation == 'otherprofile') {
                    $('.posts-target').html('');
                }
                activeDiscussion.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeSavedPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeMyPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                $('.ajax-load').html("<div class=\"bg-white overflow-hidden shadow-lg px-12 lg:px-10 pt-6 pb-4 lg:py-4 border-b-2\"><div class=\"flex justify-start items-center max-w-sm\"><img class=\"w-12 h-12 rounded-full shadow mr-4 skeleton\"><p class=\"skeleton skeleton-text\"></p></div><div class=\"mt-4\"><p class=\"skeleton skeleton-text\"></p><div class=\"px-4 bg-gray-100 rounded-md py-2 my-4\"><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p></div></div></div>");
                $('.ajax-load').show();
            },
        })
        .done(function (data) {
            if (typeNavigation == 'myprofile') {
                $('.my-post-target').html(data.posts);
            } else if (typeNavigation == 'otherprofile') {
                $('.posts-target').html(data.posts);
            }
        })
        .fail(function (error) {
            console.log(error.responseJSON);
        });
    } else if (type == 'discussion') {
        $.ajax({
            url: '/myProfile/discussion',
            type: "get",
            data: {
                type: typeNavigation,
                userId: userId,
            },
            beforeSend: function () {
                if (typeNavigation == 'myprofile') {
                    $('.my-post-target').html('');
                } else if (typeNavigation == 'otherprofile') {
                    $('.posts-target').html('');
                }
                activeMyPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeSavedPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeDiscussion.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                $('.ajax-load').html("<div class=\"bg-white overflow-hidden shadow-lg px-12 lg:px-10 pt-6 pb-4 lg:py-4 border-b-2\"><div class=\"flex justify-start items-center max-w-sm\"><img class=\"w-12 h-12 rounded-full shadow mr-4 skeleton\"><p class=\"skeleton skeleton-text\"></p></div><div class=\"mt-4\"><p class=\"skeleton skeleton-text\"></p><div class=\"px-4 bg-gray-100 rounded-md py-2 my-4\"><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p></div></div></div>");
                $('.ajax-load').show();
            },
        })
        .done(function (data) {
            if (typeNavigation == 'myprofile') {
                $('.my-post-target').html(data.posts);
            } else if (typeNavigation == 'otherprofile') {
                $('.posts-target').html(data.posts);
            }
        })
        .fail(function (error) {
            console.log(error.responseJSON);
        });
    } else if (type == 'savedpost') {
        $.ajax({
            url: '/myProfile/savedpost',
            type: "get",
            data: {
                type: typeNavigation,
                userId: userId
            },
            beforeSend: function () {
                if (typeNavigation == 'myprofile') {
                    $('.my-post-target').html('');
                } else if (typeNavigation == 'otherprofile') {
                    $('.posts-target').html('');
                }
                activeMyPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeDiscussion.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeSavedPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                $('.ajax-load').html("<div class=\"bg-white overflow-hidden shadow-lg px-12 lg:px-10 pt-6 pb-4 lg:py-4 border-b-2\"><div class=\"flex justify-start items-center max-w-sm\"><img class=\"w-12 h-12 rounded-full shadow mr-4 skeleton\"><p class=\"skeleton skeleton-text\"></p></div><div class=\"mt-4\"><p class=\"skeleton skeleton-text\"></p><div class=\"px-4 bg-gray-100 rounded-md py-2 my-4\"><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p></div></div></div>");
                $('.ajax-load').show();
            },
        })
        .done(function (data) {
            if (typeNavigation == 'myprofile') {
                $('.my-post-target').html(data.posts);
            } else if (typeNavigation == 'otherprofile') {
                $('.posts-target').html(data.posts);
            }
        })
        .fail(function (error) {
            console.log(error.responseJSON);
        });
    }
});

$('.my-nav-link-post-dropdown').on('click', function () {
    var type = $(this).attr('data-type');
    var userId = $('#post-user-id').val();

    if (type == 'mypost') {
        $.ajax({
            url: '/myProfile/mypost',
            type: "get",
            data: {
                type: typeNavigation,
                userId: userId
            },
            beforeSend: function () {
                if (typeNavigation == 'myprofile') {
                    $('.my-post-target').html('');
                } else if (typeNavigation == 'otherprofile') {
                    $('.posts-target').html('');
                }
                activeDiscussion.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeSavedPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeMyPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                $('.ajax-load').html("<div class=\"bg-white overflow-hidden shadow-lg px-12 lg:px-10 pt-6 pb-4 lg:py-4 border-b-2\"><div class=\"flex justify-start items-center max-w-sm\"><img class=\"w-12 h-12 rounded-full shadow mr-4 skeleton\"><p class=\"skeleton skeleton-text\"></p></div><div class=\"mt-4\"><p class=\"skeleton skeleton-text\"></p><div class=\"px-4 bg-gray-100 rounded-md py-2 my-4\"><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p></div></div></div>");
                $('.ajax-load').show();
            },
        })
        .done(function (data) {
            if (typeNavigation == 'myprofile') {
                $('.my-post-target').html(data.posts);
            } else if (typeNavigation == 'otherprofile') {
                $('.posts-target').html(data.posts);
            }
        })
        .fail(function (error) {
            console.log(error.responseJSON);
        });
    } else if (type == 'discussion') {
        $.ajax({
            url: '/myProfile/discussion',
            type: "get",
            data: {
                type: typeNavigation,
                userId: userId
            },
            beforeSend: function () {
                if (typeNavigation == 'myprofile') {
                    $('.my-post-target').html('');
                } else if (typeNavigation == 'otherprofile') {
                    $('.posts-target').html('');
                }
                activeMyPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeSavedPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeDiscussion.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                $('.ajax-load').html("<div class=\"bg-white overflow-hidden shadow-lg px-12 lg:px-10 pt-6 pb-4 lg:py-4 border-b-2\"><div class=\"flex justify-start items-center max-w-sm\"><img class=\"w-12 h-12 rounded-full shadow mr-4 skeleton\"><p class=\"skeleton skeleton-text\"></p></div><div class=\"mt-4\"><p class=\"skeleton skeleton-text\"></p><div class=\"px-4 bg-gray-100 rounded-md py-2 my-4\"><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p></div></div></div>");
                $('.ajax-load').show();
            },
        })
        .done(function (data) {
            if (typeNavigation == 'myprofile') {
                $('.my-post-target').html(data.posts);
            } else if (typeNavigation == 'otherprofile') {
                $('.posts-target').html(data.posts);
            }
        })
        .fail(function (error) {
            console.log(error.responseJSON);
        });
    } else if (type == 'savedpost') {
        $.ajax({
            url: '/myProfile/savedpost',
            type: "get",
            data: {
                type: typeNavigation,
                userId: userId
            },
            beforeSend: function () {
                if (typeNavigation == 'myprofile') {
                    $('.my-post-target').html('');
                } else if (typeNavigation == 'otherprofile') {
                    $('.posts-target').html('');
                }
                activeMyPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeDiscussion.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeSavedPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                $('.ajax-load').html("<div class=\"bg-white overflow-hidden shadow-lg px-12 lg:px-10 pt-6 pb-4 lg:py-4 border-b-2\"><div class=\"flex justify-start items-center max-w-sm\"><img class=\"w-12 h-12 rounded-full shadow mr-4 skeleton\"><p class=\"skeleton skeleton-text\"></p></div><div class=\"mt-4\"><p class=\"skeleton skeleton-text\"></p><div class=\"px-4 bg-gray-100 rounded-md py-2 my-4\"><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p></div></div></div>");
                $('.ajax-load').show();
            },
        })
        .done(function (data) {
            if (typeNavigation == 'myprofile') {
                $('.my-post-target').html(data.posts);
            } else if (typeNavigation == 'otherprofile') {
                $('.posts-target').html(data.posts);
            }
        })
        .fail(function (error) {
            console.log(error.responseJSON);
        });
    }
});

$('#my-search-post').on('keyup', function () {
    var search = $('#my-simple-search').val();
    var type = $('.my-nav-link-post.active').attr('data-type');
    var userId = $('#post-user-id').val();

    if(type == 'mypost') {
        $.ajax({
            url: "/myProfile/search-mypost",
            type: 'GET',
            data: {
                search: search,
                type: typeNavigation,
                userId: userId
            },
            success: function (data) {
                if (typeNavigation == 'myprofile') {
                    $('.my-post-target').html('');
                    $('.my-post-target').html(data.posts);
                } else if (typeNavigation == 'otherprofile') {
                    $('.posts-target').html('');
                    $('.posts-target').html(data.posts);
                }

                if(search == '') {
                    $('#my-active-search').attr('value', 'false');
                } else {
                    $('#my-active-search').attr('value', 'true');
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    } else if(type == 'discussion') {
        $.ajax({
            url: "/myProfile/search-discussion",
            type: 'GET',
            data: {
                search: search,
                type: typeNavigation,
                userId: userId
            },
            success: function (data) {
                if (typeNavigation == 'myprofile') {
                    $('.my-post-target').html('');
                    $('.my-post-target').html(data.posts);
                } else if (typeNavigation == 'otherprofile') {
                    $('.posts-target').html('');
                    $('.posts-target').html(data.posts);
                }

                if(search == '') {
                    $('#my-active-search').attr('value', 'false');
                } else {
                    $('#my-active-search').attr('value', 'true');
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    } else if(type == 'savedpost') {
        $.ajax({
            url: "/myProfile/search-savedpost",
            type: 'GET',
            data: {
                search: search,
                type: typeNavigation,
                userId: userId
            },
            success: function (data) {
                if (typeNavigation == 'myprofile') {
                    $('.my-post-target').html('');
                    $('.my-post-target').html(data.posts);
                } else if (typeNavigation == 'otherprofile') {
                    $('.posts-target').html('');
                    $('.posts-target').html(data.posts);
                }

                if(search == '') {
                    $('#my-active-search').attr('value', 'false');
                } else {
                    $('#my-active-search').attr('value', 'true');
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    }
});