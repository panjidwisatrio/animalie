$('.nav-link-post[data-type="latest"]').attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out');

$('.nav-link-post').on('click', function() {
    var type = $(this).attr('data-type');
    var activeLatest = $('.nav-link-post[data-type="latest"]');
    var activePopular = $('.nav-link-post[data-type="popular"]');
    var activeUnanswerd = $('.nav-link-post[data-type="unanswerd"]');

    if (type == 'latest') {
        $.ajax({
            url: "/latest",
            type: 'GET',
            success: function(data) {
                $('.posts-target').html('');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out');
                $('.posts-target').html(data.posts);
            },
            error: function(response) {
                console.log(response);
            }
        });
    } else if (type == 'popular') {
        $.ajax({
            url: "/popular",
            type: 'GET',
            success: function(data) {
                $('.posts-target').html('');
                console.log(activePopular);
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out');
                console.log(activePopular);
                $('.posts-target').html(data.posts);
            },
            error: function(response) {
                console.log(response);
            }
        });
    } else if (type == 'unanswerd') {
        $.ajax({
            url: "/unanswerd",
            type: 'GET',
            success: function(data) {
                console.log(data);
                $('.posts-target').html('');
                activeLatest.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activePopular.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out');
                activeUnanswerd.attr('class', 'nav-link-post inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out');
                $('.posts-target').html(data.posts);
            },
            error: function(response) {
                console.log(response);
            }
        });
    }
});