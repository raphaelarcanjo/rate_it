from django.urls import path
from app.views.Movie import Movie


urlpatterns = [
    path('', Movie().index, name='movies')
]