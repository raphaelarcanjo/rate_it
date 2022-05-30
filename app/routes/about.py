from ast import pattern
from django.urls import path
from app.views.About import About


urlpatterns = [
    path('', About().index, name='about')
]