from django.shortcuts import render


class Music:
    def __init__(self):
        self.data = {
            'title': 'Musics'
            }
    
    def index(self, request):
        return render(request, 'musics.html', self.data)