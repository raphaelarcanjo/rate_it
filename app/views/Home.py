from django.shortcuts import render


class Home:
    def index(self, request):
        data = {
            'title': 'Home'
        }

        return render(request, 'home.html', data)