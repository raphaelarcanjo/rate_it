from django.shortcuts import render


class Home:
    def __init__(self):
        self.data = {
            'title': 'Home'
            }

    def index(self, request):
        return render(request, 'home.html', self.data)