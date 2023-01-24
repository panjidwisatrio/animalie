$('.nav-link-categories[data-type="cow"]').attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none transition duration-150 ease-in-out hover:text-cyan-700 hover:bg-white bg-white font-semibold');
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
            success: function(data) {
                $('.posts-target').html('');
                activeCow.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none transition duration-150 ease-in-out hover:text-cyan-700 hover:bg-white bg-white font-semibold');
                activePoultry.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeGoat.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeSheep.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeFish.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeOther.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                $('#category-selected').attr('value', 'cow');
                $('.posts-target').html(data.posts);
            },
            error: function(response) {
                console.log(response);
            }
        });
    } else if (type == 'poultry') {
        $.ajax({
            url: '/interestGroup/poultry',
            type: 'GET',
            success: function(data) {
                $('.posts-target').html('');
                activeCow.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activePoultry.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none transition duration-150 ease-in-out hover:text-cyan-700 hover:bg-white bg-white font-semibold');
                activeGoat.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeSheep.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeFish.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeOther.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                $('#category-selected').attr('value', 'poultry');
                $('.posts-target').html(data.posts);
            },
            error: function(response) {
                console.log(response);
            }
        });
    } else if (type == 'goat') {
        $.ajax({
            url: '/interestGroup/goat',
            type: 'GET',
            success: function(data) {
                $('.posts-target').html('');
                activeCow.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activePoultry.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeGoat.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none transition duration-150 ease-in-out hover:text-cyan-700 hover:bg-white bg-white font-semibold');
                activeSheep.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeFish.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeOther.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                $('#category-selected').attr('value', 'goat');
                $('.posts-target').html(data.posts);
            },
            error: function(response) {
                console.log(response);
            }
        });
    } else if (type == 'sheep') {
        $.ajax({
            url: '/interestGroup/sheep',
            type: 'GET',
            success: function(data) {
                $('.posts-target').html('');
                activeCow.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activePoultry.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeGoat.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeSheep.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none transition duration-150 ease-in-out hover:text-cyan-700 hover:bg-white bg-white font-semibold');
                activeFish.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeOther.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                $('#category-selected').attr('value', 'sheep');
                $('.posts-target').html(data.posts);
            },
            error: function(response) {
                console.log(response);
            }
        });
    } else if (type == 'fish') {
        $.ajax({
            url: '/interestGroup/fish',
            type: 'GET',
            success: function(data) {
                $('.posts-target').html('');
                activeCow.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activePoultry.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeGoat.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeSheep.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeFish.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none transition duration-150 ease-in-out hover:text-cyan-700 hover:bg-white bg-white font-semibold');
                activeOther.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                $('#category-selected').attr('value', 'fish');
                $('.posts-target').html(data.posts);
            },
            error: function(response) {
                console.log(response);
            }
        });
    } else if (type == 'other') {
        $.ajax({
            url: '/interestGroup/other',
            type: 'GET',
            success: function(data) {
                $('.posts-target').html('');
                activeCow.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activePoultry.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeGoat.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeSheep.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeFish.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out');
                activeOther.attr('class', 'nav-link-categories space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none transition duration-150 ease-in-out hover:text-cyan-700 hover:bg-white bg-white font-semibold');
                $('#category-selected').attr('value', 'other');
                $('.posts-target').html(data.posts);
            },
            error: function(response) {
                console.log(response);
            }
        });
    }
});