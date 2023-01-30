$('.nav-link-post[data-type="latest"]').attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
var typeNavigation = $('#type-navigation').val();
var activeLatest = $('.nav-link-post[data-type="latest"]');
var activePopular = $('.nav-link-post[data-type="popular"]');
var activeUnanswerd = $('.nav-link-post[data-type="unanswerd"]');


$('.nav-link-post').on('click', function () {
    var selectedCategory = $('#category-selected').val();
    var selectedTag = $('#tag-selected').val();

    if (selectedTag != null) {
        selectedTag = selectedTag.toLowerCase().split(',').join('').replace(/\s/g, '-');
    }

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
            beforeSend: function () {
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                $('.posts-target').html('');
                $('.ajax-load').html("<div class=\"bg-white overflow-hidden shadow-lg px-12 lg:px-10 pt-6 pb-4 lg:py-4 border-b-2\"><div class=\"flex justify-start items-center max-w-sm\"><img class=\"w-12 h-12 rounded-full shadow mr-4 skeleton\"><p class=\"skeleton skeleton-text\"></p></div><div class=\"mt-4\"><p class=\"skeleton skeleton-text\"></p><div class=\"px-4 bg-gray-100 rounded-md py-2 my-4\"><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p></div></div></div>");
                $('.ajax-load').show();
            },
        })
            .done(function (data) {
                $('.ajax-load').hide();
                $('.posts-target').html(data.posts);
            })
            .fail(function (response) {
                console.log(response);
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
            beforeSend: function () {
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                $('.posts-target').html('');
                $('.ajax-load').html("<div class=\"bg-white overflow-hidden shadow-lg px-12 lg:px-10 pt-6 pb-4 lg:py-4 border-b-2\"><div class=\"flex justify-start items-center max-w-sm\"><img class=\"w-12 h-12 rounded-full shadow mr-4 skeleton\"><p class=\"skeleton skeleton-text\"></p></div><div class=\"mt-4\"><p class=\"skeleton skeleton-text\"></p><div class=\"px-4 bg-gray-100 rounded-md py-2 my-4\"><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p></div></div></div>");
                $('.ajax-load').show();
            },
        })
        .done(function (data) {
            $('.ajax-load').hide();
            $('.posts-target').html(data.posts);
        })
        .fail(function (response) {
            console.log(response);
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
            beforeSend: function () {
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                $('.posts-target').html('');
                $('.ajax-load').html("<div class=\"bg-white overflow-hidden shadow-lg px-12 lg:px-10 pt-6 pb-4 lg:py-4 border-b-2\"><div class=\"flex justify-start items-center max-w-sm\"><img class=\"w-12 h-12 rounded-full shadow mr-4 skeleton\"><p class=\"skeleton skeleton-text\"></p></div><div class=\"mt-4\"><p class=\"skeleton skeleton-text\"></p><div class=\"px-4 bg-gray-100 rounded-md py-2 my-4\"><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p></div></div></div>");
                $('.ajax-load').show();
            },
        })
        .done(function (data) {
            $('.ajax-load').hide();
            $('.posts-target').html(data.posts);
        })
        .fail(function (response) {
            console.log(response);
        });
    }
});

$('.nav-link-post-dropdown').on('click', function () {
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
            beforeSend: function () {
                $('.posts-target').html('');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                $('.ajax-load').html("<div class=\"bg-white overflow-hidden shadow-lg px-12 lg:px-10 pt-6 pb-4 lg:py-4 border-b-2\"><div class=\"flex justify-start items-center max-w-sm\"><img class=\"w-12 h-12 rounded-full shadow mr-4 skeleton\"><p class=\"skeleton skeleton-text\"></p></div><div class=\"mt-4\"><p class=\"skeleton skeleton-text\"></p><div class=\"px-4 bg-gray-100 rounded-md py-2 my-4\"><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p></div></div></div>");
                $('.ajax-load').show();
            },
        })
        .done(function (data) {
            $('.ajax-load').hide();
            $('.posts-target').html(data.posts);
        })
        .fail(function (response) {
            console.log(response);
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
            beforeSend: function () {
                $('.posts-target').html('');
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                $('.ajax-load').html("<div class=\"bg-white overflow-hidden shadow-lg px-12 lg:px-10 pt-6 pb-4 lg:py-4 border-b-2\"><div class=\"flex justify-start items-center max-w-sm\"><img class=\"w-12 h-12 rounded-full shadow mr-4 skeleton\"><p class=\"skeleton skeleton-text\"></p></div><div class=\"mt-4\"><p class=\"skeleton skeleton-text\"></p><div class=\"px-4 bg-gray-100 rounded-md py-2 my-4\"><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p></div></div></div>");
                $('.ajax-load').show();
            },
        })
        .done(function (data) {
            $('.ajax-load').hide();
            $('.posts-target').html(data.posts);
        })
        .fail(function (response) {
            console.log(response);
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
            beforeSend: function () {
                $('.posts-target').html('');
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                $('.ajax-load').html("<div class=\"bg-white overflow-hidden shadow-lg px-12 lg:px-10 pt-6 pb-4 lg:py-4 border-b-2\"><div class=\"flex justify-start items-center max-w-sm\"><img class=\"w-12 h-12 rounded-full shadow mr-4 skeleton\"><p class=\"skeleton skeleton-text\"></p></div><div class=\"mt-4\"><p class=\"skeleton skeleton-text\"></p><div class=\"px-4 bg-gray-100 rounded-md py-2 my-4\"><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p></div></div></div>");
                $('.ajax-load').show();
            },
            success: function (data) {
                $('.ajax-load').hide();
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

    if (selectedTag != null) {
        selectedTag = selectedTag.toLowerCase().split(',').join('').replace(/\s/g, '-');
    }

    var type = $('.nav-link-post.active').attr('data-type');

    if (type == 'latest') {
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
                $('.posts-target').html('');
                $('.posts-target').html(data.posts);

                if (search == '') {
                    $('#active-search').attr('value', 'false');
                } else {
                    $('#active-search').attr('value', 'true');
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    } else if (type == 'popular') {
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

                if (search == '') {
                    $('#active-search').attr('value', 'false');
                } else {
                    $('#active-search').attr('value', 'true');
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    } else if (type == 'unanswerd') {
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

                if (search == '') {
                    $('#active-search').attr('value', 'false');
                } else {
                    $('#active-search').attr('value', 'true');
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    }
});