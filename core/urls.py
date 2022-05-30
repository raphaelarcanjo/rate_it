from django.urls import path, include


urlpatterns = [
    path('', include('app.routes.home')),
    path('about/', include('app.routes.about')),
]
