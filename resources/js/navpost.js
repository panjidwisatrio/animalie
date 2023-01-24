$('.nav-link-post[data-type="latest"]').attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
var typeNavigation = $('#type-navigation').val();
var activeLatest = $('.nav-link-post[data-type="latest"]');
var activePopular = $('.nav-link-post[data-type="popular"]');
var activeUnanswerd = $('.nav-link-post[data-type="unanswerd"]');


$('.nav-link-post').on('click', function () {
    var selectedCategory = $('#category-selected').val();
    var selectedTag = $('#tag-selected').val();
    var type = $(this).attr('data-type');

    if (type == 'latest') {
        $.ajax({
            url: "/latest",
            type: 'GET',
            data: {
                type: typeNavigation,
                selectedCategory: selectedCategory,
                selectedTag: selectedTag
            },
            success: function (data) {
                console.log(data);
                $('.posts-target').html('');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                $('.posts-target').html(data.posts);
            },
            error: function (response) {
                console.log(response);
            }
        });
    } else if (type == 'popular') {
        $.ajax({
            url: "/popular",
            type: 'GET',
            data: {
                type: typeNavigation,
                selectedCategory: selectedCategory,
                selectedTag: selectedTag
            },
            success: function (data) {
                console.log(data);
                $('.posts-target').html('');
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                $('.posts-target').html(data.posts);
            },
            error: function (response) {
                console.log(response);
            }
        });
    } else if (type == 'unanswerd') {
        $.ajax({
            url: "/unanswerd",
            type: 'GET',
            data: {
                type: typeNavigation,
                selectedCategory: selectedCategory,
                selectedTag: selectedTag
            },
            success: function (data) {
                console.log(data);
                $('.posts-target').html('');
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                $('.posts-target').html(data.posts);
            },
            error: function (response) {
                console.log(response);
            }
        });
    }
});

$('.nav-link-post-dropdown').on('click', function () {
    var type = $(this).attr('data-type');

    if (type == 'latest') {
        $.ajax({
            url: "/latest",
            type: 'GET',
            success: function (data) {
                $('.posts-target').html('');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out');
                $('.posts-target').html(data.posts);
            },
            error: function (response) {
                console.log(response);
            }
        });
    } else if (type == 'popular') {
        $.ajax({
            url: "/popular",
            type: 'GET',
            success: function (data) {
                $('.posts-target').html('');
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out');
                $('.posts-target').html(data.posts);
            },
            error: function (response) {
                console.log(response);
            }
        });
    } else if (type == 'unanswerd') {
        $.ajax({
            url: "/unanswerd",
            type: 'GET',
            success: function (data) {
                $('.posts-target').html('');
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out');
                $('.posts-target').html(data.posts);
            },
            error: function (response) {
                console.log(response);
            }
        });
    }
});

$('#search-post').on('keyup', function () {
    var search = $('#simple-search').val();
    var selectedCategory = $('#category-selected').val();
    var selectedTag = $('#tag-selected').val();
    var type = $('.nav-link-post.active').attr('data-type');

    if(type == 'latest') {
        $.ajax({
            url: "/search",
            type: 'GET',
            data: {
                search: search,
                selectedCategory: selectedCategory,
                selectedTag: selectedTag,
                type: typeNavigation
            },
            success: function (data) {
                console.log(data.posts);
                $('.posts-target').html('');
                $('.posts-target').html(data.posts);
            },
            error: function (response) {
                console.log(response);
            }
        });
    } else if(type == 'popular') {
        $.ajax({
            url: "/search-popular",
            type: 'GET',
            data: {
                search: search,
                selectedCategory: selectedCategory,
                selectedTag: selectedTag,
                type: typeNavigation
            },
            success: function (data) {
                $('.posts-target').html('');
                $('.posts-target').html(data.posts);
            },
            error: function (response) {
                console.log(response);
            }
        });
    } else if(type == 'unanswerd') {
        $.ajax({
            url: "/search-unanswerd",
            type: 'GET',
            data: {
                search: search,
                selectedCategory: selectedCategory,
                selectedTag: selectedTag,
                type: typeNavigation
            },
            success: function (data) {
                $('.posts-target').html('');
                $('.posts-target').html(data.posts);
            },
            error: function (response) {
                console.log(response);
            }
        });
    }
});