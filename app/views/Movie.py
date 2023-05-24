from django.shortcuts import render


class Movie:
    def __init__(self):
        self.data = {
            'title': 'Movies'
            }
    
    def index(self, request):
        return render(request, 'movies.html', self.data)