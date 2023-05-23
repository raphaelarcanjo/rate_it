from django.shortcuts import render


class About:
    def __init__(self):
        self.data = {
            'title': 'About'
            }
    
    def index(self, request):
        return render(request, 'about.html', self.data)