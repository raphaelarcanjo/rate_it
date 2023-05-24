from django.urls import path
from app.views.Music import Music


urlpatterns = [
    path('', Music().index, name='musics')
]