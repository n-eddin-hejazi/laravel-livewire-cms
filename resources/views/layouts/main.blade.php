<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        {{-- start fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
        {{-- end fonts --}}
         <link href="{!! asset('theme/css/sb-admin-2.min.css') !!}" rel="stylesheet">
        <style>
            body{
                font-family: 'Cairo', sans-serif;
                background-color: #F0F0F0;
            }
            a {
                text-decoration: none !important;
                color: black;
            }
            ol, ul, menu {
                list-style: decimal !important;
                padding-left: 2rem !important;
            }
            ul, menu {
                list-style: inside !important;
                padding-left: 2rem !important;
            }
            input[type=file] {
                position: absolute !important;
                width: 100% !important;
                height: 100% !important;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                opacity: 0;
                cursor: pointer;
            }
            .input-title {
                width: 100%;
                padding: 30px;
                background: rgba(255,255,255,0.2);
                border: 2px dashed rgba(255,255,255,0.2);
                text-align: center;
                transition: background 0.3s ease-in-out;
            }
            .file-area:hover .input-title {
                background: rgba(255,255,255,0.1);
            }
            input[type=file] + .input-title {
                border-color: #f0f0f0;
                background-color: #f0f0f0;
            }
        </style>
        @yield('style')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div>
            @include('partials.navbar')
            <main class="py-4 mb-5">
                <div class="container">
                    <div class="row">
                        @include('alerts.success')
                        @yield('content')
                    </div>
                </div>
            </main>
            {{-- @include('partials.footer') --}}
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        {{-- fontawesome --}}
        <script src="https://kit.fontawesome.com/495c8a12a7.js" crossorigin="anonymous"></script>
        {{-- ckeditor --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
         <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        {{-- Pusher --}}
        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

        <script>
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;
            var pusher = new Pusher('f45e04d680d39c09fe83', {
                cluster: 'mt1'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                alert(JSON.stringify(data));
            });
        </script>

        <script src="{!! asset('theme/js/sb-admin-2.min.js') !!}"></script>


         <script type="module">
            @if(Auth::check())
                var post_userId = {{Auth::user()->id}};
                Echo.private(`real-notification.${post_userId}`)
                .listen('CommentNotification', (data) => {
                    var notificationsWrapper = $('.alert-dropdown');
                    var notificationsToggle = notificationsWrapper.find('a[data-bs-toggle]');
                    var notificationsCountElem = notificationsToggle.find('span[data-count]');
                    var notificationsCount = parseInt(notificationsCountElem.text());
                    var notifications = notificationsWrapper.find('div.alert-body');
                    var existingNotifications = notifications.html();
                    var newNotificationHtml = '<a class="dropdown-item d-flex align-items-center" href="#">\
                                                    <div class="ml-3">\
                                                        <div">\
                                                            <img style="float:right" src='+data.user_image+' width="50px" class="rounded-full"/>\
                                                        </div>\
                                                    </div>\
                                                    <div>\
                                                        <div class="small text-gray-500">'+data.date+'</div>\
                                                        <span>'+data.user_name+' وضع تعليقًا على المنشور <b>'+data.post_title+'<b></span>\
                                                    </div>\
                                                </a>';
                    notifications.html(newNotificationHtml + existingNotifications);
                    notificationsCount += 1;
                    notificationsWrapper.find('.notif-count').text(notificationsCount);
                    notificationsWrapper.show();
                });
            @endif
        </script>


        @yield('script')
    </body>
</html>
