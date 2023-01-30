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
            success: function (data) {
                activeDiscussion.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeSavedPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeMyPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                if (typeNavigation == 'myprofile') {
                    $('.my-post-target').html('');
                    $('.my-post-target').html(data.posts);
                } else if (typeNavigation == 'otherprofile') {
                    $('.posts-target').html('');
                    $('.posts-target').html(data.posts);
                }
            },
            error: function (error) {
                console.log(error.responseJSON);
            }
        });
    } else if (type == 'discussion') {
        $.ajax({
            url: '/myProfile/discussion',
            type: "get",
            data: {
                type: typeNavigation,
                userId: userId,
            },
            success: function (data) {
                activeMyPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeSavedPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeDiscussion.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                if (typeNavigation == 'myprofile') {
                    $('.my-post-target').html('');
                    $('.my-post-target').html(data.posts);
                } else if (typeNavigation == 'otherprofile') {
                    $('.posts-target').html('');
                    $('.posts-target').html(data.posts);
                }
            },
            error: function (error) {
                console.log(error.responseJSON);
            }
        });
    } else if (type == 'savedpost') {
        $.ajax({
            url: '/myProfile/savedpost',
            type: "get",
            data: {
                type: typeNavigation,
                userId: userId
            },
            success: function (data) {
                activeMyPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeDiscussion.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeSavedPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                if (typeNavigation == 'myprofile') {
                    $('.my-post-target').html('');
                    $('.my-post-target').html(data.posts);
                } else if (typeNavigation == 'otherprofile') {
                    $('.posts-target').html('');
                    $('.posts-target').html(data.posts);
                }
            },
            error: function (error) {
                console.log(error.responseJSON);
            }
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
            success: function (data) {
                $('.post-target').html('');
                activeDiscussion.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeSavedPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeMyPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                $('.post-target').html(data.posts);
            },
            error: function (error) {
                console.log(error.responseJSON);
            }
        });
    } else if (type == 'discussion') {
        $.ajax({
            url: '/myProfile/discussion',
            type: "get",
            data: {
                type: typeNavigation,
                userId: userId
            },
            success: function (data) {
                $('.post-target').html('');
                activeMyPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeSavedPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeDiscussion.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                $('.post-target').html(data.posts);
            },
            error: function (error) {
                console.log(error.responseJSON);
            }
        });
    } else if (type == 'savedpost') {
        $.ajax({
            url: '/myProfile/savedpost',
            type: "get",
            data: {
                type: typeNavigation,
                userId: userId
            },
            success: function (data) {
                $('.post-target').html('');
                activeMyPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeDiscussion.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeSavedPost.attr('class', 'my-nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                $('.post-target').html(data.posts);
            },
            error: function (error) {
                console.log(error.responseJSON);
            }
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