from django.shortcuts import render


class Book:
    def __init__(self):
        self.data = {
            'title': 'Books'
            }
    
    def index(self, request):
        return render(request, 'books.html', self.data)