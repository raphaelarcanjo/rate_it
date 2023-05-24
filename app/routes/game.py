from django.urls import path
from app.views.Game import Game


urlpatterns = [
    path('', Game().index, name='games')
]