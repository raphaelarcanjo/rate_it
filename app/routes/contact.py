from ast import pattern
from django.urls import path
from app.views.Contact import Contact


urlpatterns = [
    path('', Contact().index, name='contact')
]