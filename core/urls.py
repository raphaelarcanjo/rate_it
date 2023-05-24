from django.urls import path, include


urlpatterns = [
    path('', include('app.routes.home')),
    path('about/', include('app.routes.about')),
    path('contact/', include('app.routes.contact')),
    path('movies/', include('app.routes.movie')),
    path('musics/', include('app.routes.music')),
    path('books/', include('app.routes.book')),
    path('games/', include('app.routes.game'))
]
