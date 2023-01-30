$('.nav-link-categories[data-type="cow"]').attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none transition duration-150 ease-in-out hover:text-cyan-700 hover:bg-white bg-white font-semibold');
var activeLatest = $('.nav-link-post[data-type="latest"]');
var activePopular = $('.nav-link-post[data-type="popular"]');
var activeUnanswerd = $('.nav-link-post[data-type="unanswerd"]');
var activeCow = $('.nav-link-categories[data-type="cow"]');
var activePoultry = $('.nav-link-categories[data-type="poultry"]');
var activeGoat = $('.nav-link-categories[data-type="goat"]');
var activeSheep = $('.nav-link-categories[data-type="sheep"]');
var activeFish = $('.nav-link-categories[data-type="fish"]');
var activeOther = $('.nav-link-categories[data-type="other"]');

$('.nav-link-categories').click(function() {
    var type = $(this).data('type');

    if (type == 'cow') {
        $.ajax({
            url: '/interestGroup/cow',
            type: 'GET',
            beforeSend: function() {
                $('.posts-target').html('');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                activeCow.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none transition duration-150 ease-in-out hover:text-cyan-700 hover:bg-white bg-white font-semibold');
                activePoultry.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeGoat.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeSheep.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeFish.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeOther.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                $('.ajax-load').html("<div class=\"bg-white overflow-hidden shadow-lg px-12 lg:px-10 pt-6 pb-4 lg:py-4 border-b-2\"><div class=\"flex justify-start items-center max-w-sm\"><img class=\"w-12 h-12 rounded-full shadow mr-4 skeleton\"><p class=\"skeleton skeleton-text\"></p></div><div class=\"mt-4\"><p class=\"skeleton skeleton-text\"></p><div class=\"px-4 bg-gray-100 rounded-md py-2 my-4\"><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p></div></div></div>");
                $('.ajax-load').show();
            },
        })
        .done(function(data) {
            $('.ajax-load').hide();
            $('#category-selected').attr('value', 'cow');
            $('.posts-target').html(data.posts);
        })
        .fail(function(response) {
            console.log(response);
        });
    } else if (type == 'poultry') {
        $.ajax({
            url: '/interestGroup/poultry',
            type: 'GET',
            beforeSend: function() {
                $('.posts-target').html('');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                activeCow.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activePoultry.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none transition duration-150 ease-in-out hover:text-cyan-700 hover:bg-white bg-white font-semibold');
                activeGoat.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeSheep.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeFish.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeOther.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                $('.ajax-load').html("<div class=\"bg-white overflow-hidden shadow-lg px-12 lg:px-10 pt-6 pb-4 lg:py-4 border-b-2\"><div class=\"flex justify-start items-center max-w-sm\"><img class=\"w-12 h-12 rounded-full shadow mr-4 skeleton\"><p class=\"skeleton skeleton-text\"></p></div><div class=\"mt-4\"><p class=\"skeleton skeleton-text\"></p><div class=\"px-4 bg-gray-100 rounded-md py-2 my-4\"><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p></div></div></div>");
                $('.ajax-load').show();
            },
        })
        .done(function(data) {
            $('.ajax-load').hide();
            $('#category-selected').attr('value', 'poultry');
            $('.posts-target').html(data.posts);
        })
        .fail(function(response) {
            console.log(response);
        });
    } else if (type == 'goat') {
        $.ajax({
            url: '/interestGroup/goat',
            type: 'GET',
            beforeSend: function() {
                $('.posts-target').html('');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                activeCow.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activePoultry.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeGoat.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none transition duration-150 ease-in-out hover:text-cyan-700 hover:bg-white bg-white font-semibold');
                activeSheep.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeFish.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeOther.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                $('.ajax-load').html("<div class=\"bg-white overflow-hidden shadow-lg px-12 lg:px-10 pt-6 pb-4 lg:py-4 border-b-2\"><div class=\"flex justify-start items-center max-w-sm\"><img class=\"w-12 h-12 rounded-full shadow mr-4 skeleton\"><p class=\"skeleton skeleton-text\"></p></div><div class=\"mt-4\"><p class=\"skeleton skeleton-text\"></p><div class=\"px-4 bg-gray-100 rounded-md py-2 my-4\"><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p></div></div></div>");
                $('.ajax-load').show();
            },
        })
        .done(function(data) {
            $('.ajax-load').hide();
            $('#category-selected').attr('value', 'goat');
            $('.posts-target').html(data.posts);
        })
        .fail(function(response) {
            console.log(response);
        });
    } else if (type == 'sheep') {
        $.ajax({
            url: '/interestGroup/sheep',
            type: 'GET',
            beforeSend: function() {
                $('.posts-target').html('');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                activeCow.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activePoultry.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeGoat.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeSheep.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none transition duration-150 ease-in-out hover:text-cyan-700 hover:bg-white bg-white font-semibold');
                activeFish.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeOther.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                $('.ajax-load').html("<div class=\"bg-white overflow-hidden shadow-lg px-12 lg:px-10 pt-6 pb-4 lg:py-4 border-b-2\"><div class=\"flex justify-start items-center max-w-sm\"><img class=\"w-12 h-12 rounded-full shadow mr-4 skeleton\"><p class=\"skeleton skeleton-text\"></p></div><div class=\"mt-4\"><p class=\"skeleton skeleton-text\"></p><div class=\"px-4 bg-gray-100 rounded-md py-2 my-4\"><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p></div></div></div>");
                $('.ajax-load').show();
            },
        })
        .done(function(data) {
            $('.ajax-load').hide();
            $('#category-selected').attr('value', 'sheep');
            $('.posts-target').html(data.posts);
        })
        .fail(function(response) {
            console.log(response);
        });
    } else if (type == 'fish') {
        $.ajax({
            url: '/interestGroup/fish',
            type: 'GET',
            beforeSend: function() {
                $('.posts-target').html('');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                activeCow.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activePoultry.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeGoat.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeSheep.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeFish.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none transition duration-150 ease-in-out hover:text-cyan-700 hover:bg-white bg-white font-semibold');
                activeOther.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                $('.ajax-load').html("<div class=\"bg-white overflow-hidden shadow-lg px-12 lg:px-10 pt-6 pb-4 lg:py-4 border-b-2\"><div class=\"flex justify-start items-center max-w-sm\"><img class=\"w-12 h-12 rounded-full shadow mr-4 skeleton\"><p class=\"skeleton skeleton-text\"></p></div><div class=\"mt-4\"><p class=\"skeleton skeleton-text\"></p><div class=\"px-4 bg-gray-100 rounded-md py-2 my-4\"><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p></div></div></div>");
                $('.ajax-load').show();
            },
        })
        .done(function(data) {
            $('.ajax-load').hide();
            $('#category-selected').attr('value', 'fish');
            $('.posts-target').html(data.posts);
        })
        .fail(function(response) {
            console.log(response);
        });
    } else if (type == 'other') {
        $.ajax({
            url: '/interestGroup/other',
            type: 'GET',
            beforeSend: function() {
                $('.posts-target').html('');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out active');
                activeCow.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activePoultry.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeGoat.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeSheep.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeFish.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeOther.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none transition duration-150 ease-in-out hover:text-cyan-700 hover:bg-white bg-white font-semibold');
                $('.ajax-load').html("<div class=\"bg-white overflow-hidden shadow-lg px-12 lg:px-10 pt-6 pb-4 lg:py-4 border-b-2\"><div class=\"flex justify-start items-center max-w-sm\"><img class=\"w-12 h-12 rounded-full shadow mr-4 skeleton\"><p class=\"skeleton skeleton-text\"></p></div><div class=\"mt-4\"><p class=\"skeleton skeleton-text\"></p><div class=\"px-4 bg-gray-100 rounded-md py-2 my-4\"><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p><p class=\"skeleton skeleton-text\"></p></div></div></div>");
                $('.ajax-load').show();
            },
        })
        .done(function(data) {
            $('.ajax-load').hide();
            $('#category-selected').attr('value', 'other');
            $('.posts-target').html(data.posts);
        })
        .fail(function(response) {
            console.log(response);
        });
    }
});