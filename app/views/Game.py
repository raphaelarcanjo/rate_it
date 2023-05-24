from django.shortcuts import render


class Game:
    def __init__(self):
        self.data = {
            'title': 'Games'
            }
    
    def index(self, request):
        return render(request, 'games.html', self.data)