from ast import pattern
from django.urls import path
from app.views.Home import Home


urlpatterns = [
    path('', Home().index, name='home')
]