from django.urls import path
from app.views.Book import Book


urlpatterns = [
    path('', Book().index, name='books')
]